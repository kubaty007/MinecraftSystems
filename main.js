const slide = () => {
    
    console.log(document.querySelector('.button'));
    console.log(document.querySelector('.links'));

    const button = document.querySelector('.button');
    const links = document.querySelector('.links');

    button.addEventListener('click', () =>{
        links.classList.toggle('links-active');
    })
}

slide();