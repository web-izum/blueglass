const closeOnClickOverlay = () => {

    document.body.addEventListener('click', (e) => {
        const E_TARGET = e.target;
        if (E_TARGET == document.body) {
            document.body.classList.remove('no-scroll');

            document.querySelectorAll('.open').forEach( (open_popup) => {
                open_popup.classList.remove('open');
            } );
        }
    });
}

export default closeOnClickOverlay;