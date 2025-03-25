import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



//lucide icons
import { createIcons, CircleCheckBig ,Check,Truck,Upload, ShieldCheck, CircleArrowRight,Heart,ImageUp,SendHorizontal,PawPrint,ShoppingBag,Bell,MessageSquareText,CircleChevronLeft,Plus,Minus,Trash2,House,ChevronDown,NotebookPen,PhilippinePeso,ShoppingBasket,Bone,CircleUser,LogOut} from 'lucide';

createIcons({
    icons: { CircleCheckBig,Check,Truck ,ShieldCheck,Upload, CircleArrowRight,PawPrint,Heart,ImageUp,SendHorizontal, ShoppingBag, Bell,MessageSquareText,CircleChevronLeft,Plus,Minus,Trash2, House,NotebookPen ,ChevronDown,PhilippinePeso, ShoppingBasket,Bone, CircleUser,LogOut},
});



// Quantity input
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("#Quantity-inputs").forEach((container) => {
        const decrementButton = container.querySelector("[data-input-counter-decrement]");
        const incrementButton = container.querySelector("[data-input-counter-increment]");
        const quantityInput = container.querySelector("[data-input-counter]");

        decrementButton.addEventListener("click", function () {
            let value = parseInt(quantityInput.value, 10);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        incrementButton.addEventListener("click", function () {
            let value = parseInt(quantityInput.value, 10);
            quantityInput.value = value + 1;
        });
    });
});


// js show more
    document.addEventListener('DOMContentLoaded', function () {
    // Select the button and the hidden product container
    const showMoreBtn = document.getElementById('showMoreBtn');
    const hiddenProducts = document.getElementById('hidden-products');

    // Ensure the button exists before adding an event listener
    if (showMoreBtn) {
        showMoreBtn.addEventListener('click', function () {
            // Toggle the hidden class
            if (hiddenProducts.classList.contains('hidden')) {
                hiddenProducts.classList.remove('hidden'); // Show the products
                this.textContent = 'Show Less'; // Update button text
            } else {
                hiddenProducts.classList.add('hidden'); // Hide the products
                this.textContent = 'Show More'; // Update button text
            }
        });
    }
});

//return to top
 document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("return-top").addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  });



document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.see-more-btn').forEach(button => {
        button.addEventListener('click', function() {
            let list = this.closest('ul'); // Find the closest <ul> to the clicked button
            let hiddenItems = list.querySelectorAll('.hidden');
            
            if (this.textContent === 'See More') {
                hiddenItems.forEach(item => item.classList.remove('hidden'));
                this.textContent = 'See Less';
            } else {
                hiddenItems.forEach(item => item.classList.add('hidden'));
                this.textContent = 'See More';
            }
        });
    });
});

