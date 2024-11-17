let currentIndex = 0;
const images = document.querySelectorAll('.carousel-image');

function showImage(index) {
    images.forEach((img, i) => {
        img.classList.remove('active');
        if (i === index) {
            img.classList.add('active');
        }
    });
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    showImage(currentIndex);
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage(currentIndex);
}

// Inicializa o carrossel com a primeira imagem visível
showImage(currentIndex);

// Intervalo para alternar a imagem automaticamente a cada 5 segundos
setInterval(nextImage, 5000);
