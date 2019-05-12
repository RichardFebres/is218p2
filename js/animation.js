function register_slideIn() {
    console.log("register sliding in...");

    // Kick off animation on both the login and register cards
    var cards = document.getElementsByClassName("card-wrapper");
    for (var i=0; i<cards.length; i++)
    {
        cards[i].classList.remove('animation-slideRight');
        cards[i].classList.add('animation-slideLeft');
    }

}

function register_slideOut() {
    console.log("register sliding in...");

    // Kick off animation on both the login and register cards
    var cards = document.getElementsByClassName("card-wrapper");
    for (var i=0; i<cards.length; i++)
    {
        cards[i].classList.remove('animation-slideLeft');
        cards[i].classList.add('animation-slideRight');
    }

}
