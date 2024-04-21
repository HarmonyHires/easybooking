import barbaInitialize from "./barbaInitialize";
import "./bootstrap";
const DEBUG = ![];
// * !![] == true
// * ![] == false
// const DEBUG = false;
// const DEBUG = true;
const repaint = () => {
    document
        .querySelectorAll("*")
        .forEach((e) => (e.style.outline = "grey 1px solid"));
    requestAnimationFrame(repaint);
};
if (DEBUG) repaint();
window.mobileAndTabletCheck = function () {
    let check = false;
    (function (a) {
        if (
            /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
                a
            ) ||
            /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
                a.substr(0, 4)
            )
        )
            check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
};
const AnimationFunction = () => {
    barbaInitialize();
    const sectionArray = document.querySelectorAll("[aria-label='content']");
    const sectionPosition = {};
    const offset = document.querySelector(".navbar").offsetHeight;
    sectionArray.forEach(
        (section) => (sectionPosition[section.id] = section.offsetTop - offset)
    );
    let themes = [
        "lightdim",
        "light",
        "dark",
        "cupcake",
        "bumblebee",
        "emerald",
        "corporate",
        "synthwave",
        "retro",
        "cyberpunk",
        "valentine",
        "halloween",
        "garden",
        "forest",
        "aqua",
        "lofi",
        "pastel",
        "fantasy",
        "wireframe",
        "black",
        "luxury",
        "dracula",
        "cmyk",
        "autumn",
        "business",
        "acid",
        "lemonade",
        "night",
        "coffee",
        "winter",
        "dim",
        "nord",
        "sunset",
    ];
    let themeUl = document.querySelector("#theme-ul");
    let currentTheme = false;
    themes.forEach((e, x) => {
        if (window.localStorage.getItem("theme") == e) currentTheme = e;
        themeUl.innerHTML += `<li data-theme="${e}" class="bg-transparent">
        <input ${
            e ? "checked='true'" : ""
        } data-theme="${e}" type="radio" class="hidden peer" name="selected-theme" id="theme-${x}">
        <label data-set-theme="${e}" data-act-class="ACTIVECLASS" for="theme-${x}" class="theme-changer flex gap-2 px-2 justify-between btn peer-checked:*:opacity-100">
            <span class="icon-[fontisto--radio-btn-active] opacity-0 transition text-xl"></span>
            <span class="grow text-left">${_.capitalize(e)}</span>
            <div class="right-0 badge-lg badge bg-gradient-to-br from-primary to-secondary via-accent"></div>
        </label>
    </li>`;
    });
    requestAnimationFrame(() => {
        if (currentTheme) {
            document.querySelector(
                `input[data-theme=${currentTheme}]`
            ).checked = true;
        }
        themeChange(false, "admin-panel");
    });
    document
        .querySelector("#drawer-compactor")
        .addEventListener("click", (e) => {
            let btn = document.querySelector("#drawer-compactor");
            if (btn.dataset.compact == "true") {
                btn.dataset.compact = "false";
                btn.classList.remove("w-full");
                // document.querySelector("#drawer-title-parent").classList.remove("md:px-10");
                document
                    .querySelector("#drawer-title-parent")
                    .classList.remove("!px-2");
                document
                    .querySelector("#drawer-title")
                    .classList.remove("hidden");
                document
                    .querySelector("#sidebar-ul")
                    .classList.add("w-64", "px-6");
                document
                    .querySelectorAll(".menu-custom :where(li ul)")
                    .forEach((e) => e.classList.remove("menu-custom-no-line"));
                document
                    .querySelector("#sidebar-ul")
                    .classList.remove("w-20", "px-2");
                document.querySelectorAll(".drawer-links-name").forEach((e) => {
                    e.classList.remove(..."hidden".split(" "));
                });
                document.querySelectorAll(".drawer-links-icon").forEach((e) => {
                    e.classList.remove(..."w-full".split(" "));
                });
            } else if (btn.dataset.compact == "false") {
                btn.dataset.compact = "true";
                btn.classList.add("w-full");
                // document.querySelector("#drawer-title-parent").classList.add("md:px-10");
                document
                    .querySelector("#drawer-title-parent")
                    .classList.add("!px-2");
                document.querySelector("#drawer-title").classList.add("hidden");
                document
                    .querySelector("#sidebar-ul")
                    .classList.remove("w-64", "px-6");
                document
                    .querySelectorAll(".menu-custom :where(li ul)")
                    .forEach((e) => e.classList.add("menu-custom-no-line"));
                document
                    .querySelector("#sidebar-ul")
                    .classList.add("w-20", "px-2");
                document.querySelectorAll(".drawer-links-name").forEach((e) => {
                    e.classList.add(..."hidden".split(" "));
                });
                document.querySelectorAll(".drawer-links-icon").forEach((e) => {
                    e.classList.add(..."w-full".split(" "));
                });
            }
        });
};
document.addEventListener("DOMContentLoaded", (e) => {
    let addScrollEvent = (element) => {
        element.addEventListener("click", function (e) {
            e.preventDefault();
            window.location.replace(this.getAttribute("href"));
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);
            let offset = document.querySelector(".navbar").offsetHeight;
            // console.f(offset, (targetElement ?? document.body).offsetTop - offset);
            document.querySelector("#sidebar-nav").checked = false;
            window.scrollTo({
                top: (targetElement ?? document.body).offsetTop - offset,
                behavior: "smooth",
            });
        });
    };
    // Smooth scrolling for anchor links in navbar
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        addScrollEvent(anchor);
    });
    if (!window.localStorage.getItem("theme")) {
        if (
            window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        ) {
            window.localStorage.setItem("theme", "dark");
            document.documentElement.dataset.theme = "dark";
        } else {
            window.localStorage.setItem("theme", "lightdim");
            document.documentElement.dataset.theme = "lightdim";
        }
    }
    document.querySelector(`a[href="${window.location.hash}"`) &&
        (document.querySelector(
            `a[href="${window.location.hash}"`
        ).ariaSelected = true);
    AnimationFunction();
});

// Scroll up function
document.addEventListener("scroll", (e) => {});

function closeSidebar() {
    document.querySelector("#sidebar-nav").checked = false;
}
