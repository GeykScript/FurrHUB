import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



import { createIcons, CircleCheckBig ,Truck, ShieldCheck, CircleArrowRight,PawPrint   } from 'lucide';

createIcons({
    icons: { CircleCheckBig,Truck ,ShieldCheck, CircleArrowRight,PawPrint  },
});


