import imagesLoaded from "imagesloaded";
import Masonry from "masonry-layout";
import InfiniteScroll from "infinite-scroll";
import lightbox from "./lightbox";

InfiniteScroll.imagesLoaded = imagesLoaded;

const gallery = document.querySelector(".gallery");

let msnry = new Masonry(gallery, {
    itemSelector: "none",
    columnWidth: ".gallery-sizer",
    percentPosition: true,
    gutter: 20,
    stagger: 30,
    // nicer reveal transition
    visibleStyle: { transform: "translateY(0)", opacity: 1 },
    hiddenStyle: { transform: "translateY(100px)", opacity: 0 },
});

imagesLoaded(gallery, () => {
    gallery.classList.remove("are-images-unloaded");
    msnry.options.itemSelector = ".gallery-item";
    let items = gallery.querySelectorAll(".gallery-item");
    msnry.appended(items);
});

let infScroll = new InfiniteScroll(gallery, {
    path: "?page={{#}}",
    append: ".gallery-item",
    outlayer: msnry,
    history: false,
}).on("append", (body, path, items, response) => {
    lightbox.refresh();
});
