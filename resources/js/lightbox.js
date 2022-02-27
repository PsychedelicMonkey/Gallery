import lightGallery from "lightgallery";

const gallery = document.querySelector(".gallery");

let lightbox = lightGallery(gallery, {
    speed: 500,
    selector: ".gallery-item",
    subHtmlSelectorRelative: true,
});

export default lightbox;
