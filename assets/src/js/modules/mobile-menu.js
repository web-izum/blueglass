import closeOnClickOverlay from "./close-on-click-overlay";

/*
  *  @param trigger:string selector element (class, id, attr)
  *  @param navigation: string selector element (class, id, attr)
 */

const mobileMenu = (trigger, navigation, closeBtn) => {

    const TRIGGER_BTN = document.querySelector(trigger);
    const NAVIGATION  = document.querySelector(navigation);
    const CLOSE_BTN   = document.querySelector(closeBtn);

    const toggleNav = () => {
        NAVIGATION.classList.toggle('open');
        document.body.classList.toggle('no-scroll');
    }

    if (TRIGGER_BTN) {
        TRIGGER_BTN.addEventListener('click', () => {
            toggleNav();
        });
    }

    if(CLOSE_BTN) {
        CLOSE_BTN.addEventListener('click', () => {
            toggleNav()
        });
    }

    if(NAVIGATION) {
        window.addEventListener('resize' , () => {
            if (window.screen.availWidth > 993) {
                NAVIGATION.classList.remove('open');
                document.body.classList.remove('no-scroll');
            }
        });
    }

    closeOnClickOverlay();
}

export default mobileMenu;