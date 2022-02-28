import lightGallery from "lightgallery";
import lgZoom from "lightgallery/plugins/zoom";

const gallery = document.querySelector(".gallery");

let lightbox = lightGallery(gallery, {
    speed: 500,
    selector: ".gallery-item",
    subHtmlSelectorRelative: true,
    plugins: [lgZoom],
});

export default lightbox;
