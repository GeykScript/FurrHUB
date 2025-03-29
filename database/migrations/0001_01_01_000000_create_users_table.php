<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_img')->nullable(); // ✅ Allows null values
            $table->timestamps();
        });


        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('fname', 30);
            $table->string('lname', 30);
            $table->string('email', 50)->unique();
            $table->string('phone_number', 11);
            $table->string('password', 50);
            $table->string('remember_token', 100);
            $table->timestamps(); // This will automatically create 'created_at' and 'updated_at' columns
        });


        Schema::create('pets', function (Blueprint $table) {
            $table->id('pet_id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('pet_name', 50);
            $table->tinyInteger('age');
            $table->string('gender', 10);
            $table->date('birthday');
            $table->integer('weight');
            $table->string('vaccination_proof', 255);
            $table->string('animal_type', 50);
            $table->string('pet_breed', 50);
            $table->string('color', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });


        Schema::create('addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('province', 50);
            $table->string('city', 100);
            $table->string('barangay', 100);
            $table->string('street', 50);
            $table->integer('postal_code');
            $table->boolean('default')->default(true);
            $table->timestamps();
        });

        Schema::create('statuses', function (Blueprint $table) {
            $table->id('status_id'); // Creates 'status_id' as primary key with AUTO_INCREMENT
            $table->string('status_name', 255);
            $table->string('status_details', 255);
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Optionally, you can add soft deletes if you plan to use Laravel's SoftDeletes trait
            // $table->softDeletes(); // This creates 'deleted_at' column automatically
        });



        Schema::create('discounts', function (Blueprint $table) {
            $table->id('discount_id'); // Laravel automatically creates 'id' as the primary key
            $table->string('code', 50);
            $table->text('description')->nullable();
            $table->enum('discount_type', ['percentage', 'fixed']);
            $table->decimal('discount_value', 10, 2);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('status_id')->references('status_id')->on('statuses')->onDelete('cascade');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Laravel automatically creates an 'id' column as primary key (BIGINT UNSIGNED)
            $table->unsignedBigInteger('category_id');
            $table->integer('serial_number');
            $table->string('name', 255);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('quantity_sold')->default(0); // Default value added for consistency
            $table->date('expiry_date');
            $table->string('image_url', 255);
            $table->integer('stock_quantity')->default(0);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('discount_id')->references('discount_id')->on('discounts')->onDelete('set null');
        });


     
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->unsignedBigInteger('user_id');
            $table->float('total_amount')->default(0);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('cart_id');
            $table->integer('quantity');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('cart_id')->references('cart_id')->on('carts')->onDelete('cascade');
        });

        Schema::create('wishlist', function (Blueprint $table) {
            $table->id('wishlist_id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id'); // Foreign key reference
            $table->unsignedBigInteger('product_id'); // Foreign key reference
            $table->timestamps(); // Adds created_at & updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });

      


        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id'); // Auto-incrementing primary key
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('category'); // Foreign key reference
            $table->unsignedBigInteger('status'); // Foreign key reference
            $table->unsignedBigInteger('discount_id')->nullable(); // Foreign key reference
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('category')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('status')->references('status_id')->on('statuses')->onDelete('cascade');
            $table->foreign('discount_id')->references('discount_id')->on('discounts')->onDelete('set null');
        });

         Schema::create('payment_methods', function (Blueprint $table) {
            $table->id('payment_method_id'); // Auto-incrementing primary key
            $table->string('payment_name', 30); // Name of the payment method
            $table->timestamps(); // Adds created_at & updated_at
        });


     
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id'); // Foreign key reference
            $table->unsignedBigInteger('service_id'); // Foreign key reference
            $table->date('appointment_date'); // Stores only the date
            $table->time('appointment_time'); // Stores only the time
            $table->unsignedBigInteger('pet_id'); // Foreign key reference
            $table->unsignedBigInteger('payment_status'); // Foreign key reference
            $table->unsignedBigInteger('payment_method'); // Foreign key reference
            $table->text('receipts', 255)->nullable(); // Nullable image path

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade');
            $table->foreign('pet_id')->references('pet_id')->on('pets')->onDelete('cascade');
            $table->foreign('payment_status')->references('status_id')->on('statuses')->onDelete('cascade');
            $table->foreign('payment_method')->references('payment_method_id')->on('payment_methods')->onDelete('cascade');
        });




        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Auto-incrementing primary key

            $table->unsignedBigInteger('user_id'); // Foreign key reference to users
            $table->decimal('total_amount', 10, 2);
            $table->string('reference_number', 50)->unique();
            $table->unsignedBigInteger('status'); // Order status
            $table->unsignedBigInteger('payment_status'); // Payment status
            $table->unsignedBigInteger('payment_method'); // Payment method (FK)
            $table->text('receipts', 255)->nullable(); // Nullable image path
            $table->unsignedBigInteger('shipping_address'); // Foreign key reference to addresses



            $table->timestamps();

            // Foreign key constraints
            $table->foreign('shipping_address')->references('address_id')->on('addresses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status')->references('status_id')->on('statuses')->onDelete('cascade');
            $table->foreign('payment_status')->references('status_id')->on('statuses')->onDelete('cascade');
            $table->foreign('payment_method')->references('payment_method_id')->on('payment_methods')->onDelete('cascade');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('order_id'); // Foreign key reference to orders
            $table->unsignedBigInteger('product_id')->nullable(); // Foreign key reference to products;
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // Price per item
            $table->timestamps(); // Adds created_at & updated_at

            // Foreign key constraints
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('set null');
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->integer('ratings');
            $table->string('review_img', 255);
            $table->text('review_text');
            $table->timestamp('review_date')->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrentOnUpdate();
            $table->timestamps(); // Automatically adds created_at & updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id('message_id'); // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id');
            $table->text('user_msg');
            $table->text('admin_reply')->nullable(); // Reply might not be immediate
            $table->unsignedBigInteger('admin_id')->nullable(); // Nullable in case no admin reply yet
            $table->unsignedBigInteger('msg_status'); // Status of the message (e.g., read/unread)
            $table->unsignedBigInteger('reply_status'); // Status of the reply (e.g., pending/replied)
            $table->timestamps(); // Automatically adds created_at & updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admin')->onDelete('set null'); // If admin is deleted, keep the message
            $table->foreign('msg_status')->references('status_id')->on('statuses')->onDelete('cascade'); // Links msg_status to statuses
            $table->foreign('reply_status')->references('status_id')->on('statuses')->onDelete('cascade'); // Links reply_status to statuses
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->text('questions');
            $table->text('answers');
            $table->timestamps(); // Includes created_at & updated_at
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('status_id');

            // Foreign Key Constraint
            $table->foreign('status_id')->references('status_id')->on('statuses')->onDelete('cascade');
        });

        
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('pets');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
