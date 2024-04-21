export default function barbaInitialize() {
    barba.init({
        transitions: [
            {
                name: "opacity-transition",
                leave(data) {
                    document.querySelectorAll(".drawer-links").forEach((e) => {
                        e.classList.remove("btn-active", "pointer-events-none");
                        e.classList.add("opacity-25", "pointer-events-none");
                        // e.setAttribute("disabled", "disabled");
                    });
                    console.log(data);
                    return gsap.to(data.current.container, {
                        opacity: 0,
                        onComplete: () => {
                            gsap.set(data.current.container, {
                                display: "none",
                            });
                        },
                    });
                },
                afterLeave(data) {
                    document.querySelectorAll(".drawer-links").forEach((e) => {
                        e.classList.remove("opacity-25", "pointer-events-none");
                        if (
                            e.dataset.route.split(".")[0] ==
                            data.next.namespace.split(".")[0]
                        ) {
                            e.classList.add(
                                "btn-active",
                                "pointer-events-none"
                            );
                        }
                        // e.removeAttribute("disabled");
                    });
                },
                enter(data) {
                    return gsap.from(data.next.container, {
                        opacity: 0,
                        onComplete: () => {
                            gsap.set(data.current.container, {
                                display: "none",
                            });
                        },
                    });
                },
            },
        ],
    });
}
