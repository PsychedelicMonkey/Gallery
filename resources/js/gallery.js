import imagesloaded from "imagesloaded";
import Masonry from "masonry-layout";
import lightGallery from "lightgallery";

const gallery = document.querySelector(".gallery");
let msnry;

imagesloaded(gallery, () => {
    msnry = new Masonry(gallery, {
        itemSelector: ".gallery-item",
        columnWidth: ".gallery-sizer",
        percentPosition: true,
        gutter: 20,
    });
});

lightGallery(gallery, {
    speed: 500,
    selector: ".gallery-item",
    subHtmlSelectorRelative: true,
});
