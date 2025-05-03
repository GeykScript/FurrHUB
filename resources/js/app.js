import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// lucide icons
import {
        createIcons,
        Bell,
        Bone,
        Check,
        ChevronDown,
        CircleArrowRight,
        CircleCheckBig,
        CircleChevronLeft,
        CircleUser,
        Heart,
        House,
        HousePlus,
        ImageUp,
        LogOut,
        MapPinHouse,
        MapPinPlus,
        MessageSquareText,
        Minus,
        NotebookPen,
        PawPrint,
        PhilippinePeso,
        PhoneCall,
        Plus,
        SendHorizontal,
        ShieldCheck,
        ShoppingBag,
        ShoppingBasket,
        Star,
        Trash2,
        TriangleAlert,
        Truck,
        Upload,
        User,
        UserPen,
        UserRoundPen,
        CalendarClock,
        NotepadText,
        ShoppingCart,
        NotebookText,
        MessagesSquare,
        Sheet,
        FileText,
        Eye,
        SquarePen,
        Ticket,
        ChevronUp
} from 'lucide';

createIcons({
  icons: {
        Bell,
        Bone,
        Check,
        ChevronDown,
        CircleArrowRight,
        CircleCheckBig,
        CircleChevronLeft,
        CircleUser,
        Heart,
        House,
        HousePlus,
        ImageUp,
        LogOut,
        MapPinHouse,
        MapPinPlus,
        MessageSquareText,
        Minus,
        NotebookPen,
        PawPrint,
        PhilippinePeso,
        PhoneCall,
        Plus,
        SendHorizontal,
        ShieldCheck,
        ShoppingBag,
        ShoppingBasket,
        Star,
        Trash2,
        TriangleAlert,
        Truck,
        Upload,
        User,
        UserPen,
        UserRoundPen,
        CalendarClock,
        NotepadText,
        ShoppingCart,
        NotebookText,
        MessagesSquare,
        Sheet,
        FileText,
        Eye,
        SquarePen,
        Ticket,
        ChevronUp
  },
});


     import DataTable from 'datatables.net-dt';
        let table = new DataTable('#ServiceTable');
        let table2 = new DataTable('#ServiceHistoryTable');
        let table3 = new DataTable('#ProductTable');
        let table4 = new DataTable('#OrderTable');
        let table5 = new DataTable('#AppointmentTable');
        let table6 = new DataTable('#DiscountTable');
      


// js show more for product
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

// js return to top
document.addEventListener("DOMContentLoaded", function () {
  const returnTopButton = document.getElementById("return-top");

  // Check if the element exists before attaching the event listener
  if (returnTopButton) {
    returnTopButton.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  } else {
    console.log("Return to top button not found!");
  }
});



// js show more for price list
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



// Add event listener to the wishlist button
// togle note for wishlist
   document.getElementById("wishlistBtn").addEventListener("click", function() {
                        document.getElementById("note").classList.toggle("hidden");
                    });
