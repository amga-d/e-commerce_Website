// // // document.addEventListener('DOMContentLoaded', function() {
// // //     loadContent('/src/view/home.php');
// // // });

// // // function loadContent(page) {
// // //     fetch(page)
// // //         .then(response => response.text())
// // //         .then(data => {
// // //             document.getElementById('content').innerHTML = data;
// // //         })
// // //         .catch(error => console.error('Error loading content:', error));
// // // }

// // const content = document.getElementById('content');

// // // Page content map
// // const pages= {

// //     shop: '/src/view/shop.php',
// //     blog: '/src/view/blog.php',
// //     contact: '/src/view/contact.php',
// //     about: '/src/view/about.php'
// // }

// Elements
const navbar = document.getElementById("navbar");
const bar = document.getElementById("bar");
const close = document.getElementById("close");
const content = document.getElementById("content");
const cart = document.getElementById("cart");
const mobile_cart = document.getElementById("mobile-cart");
const logo = document.getElementById("logo");

// Page content mapping
const pages = {
    home: "/src/view/home.php",
    shop: "/src/view/shop.php",
    blog: "/src/view/blog.php",
    about: "/src/view/about.php",
    contact: "/src/view/contact.php",
    cart: "/src/view/cart.php",
};

// Function to load the content and update the active class
async function loadPage(page) {
    // Update content
    if (pages[page]) {
        try {
            // Fetch the HTML file
            const response = await fetch(pages[page]);
            if (!response.ok) throw new Error("Page not found");
            const html = await response.text();

            // Update the content area
            content.innerHTML = html;
        } catch (error) {
            content.innerHTML = `<h1>Error loading the page`;
        }
        // Update the active class
        document.querySelectorAll("#navbar a").forEach((link) => {
            link.classList.remove("active");
            if (link.classList.contains(page)) {
                link.classList.add("active");
            }
        });

        // Update browser history
        history.replaceState({ page }, page, `#${page}`);
    } else {
        content.innerHTML = "<h1>Page Not Found</h1>";
    }
}

// Mobile menu toggle
if (bar) {
    bar.addEventListener("click", () => {
        navbar.classList.add("active");
    });
}
if (close) {
    close.addEventListener("click", () => {
        navbar.classList.remove("active");
    });
}

// Navigation click handling
navbar.addEventListener("click", (event) => {
    if (event.target.tagName === "A") {
        if (!(event.target.className == "logout") ){
            event.preventDefault();
            const page = event.target.className.split(" ")[0]; // Get the first class name
            if (pages[page]) {
                loadPage(page);
                history.pushState({ page }, page, `#${page}`); // Push new state into history
            }
        }
    }
});

cart.addEventListener("click", (event) => {
    event.preventDefault();
    // Check if clicked element is the icon or the parent
    const clickedElement = event.target.closest("#cart") || event.target;
    const page = clickedElement.className.split(" ")[0];
    if (pages[page]) {
        loadPage(page);
        history.pushState({ page }, page, `#${page}`);
    }
});

logo.addEventListener("click", (event) => {
    event.preventDefault();
    const page = "home";
    loadPage(page);
    history.pushState({ page }, page, `#${page}`);
});

mobile_cart.addEventListener("click", (event) => {
    event.preventDefault();
    // Check if clicked element is the icon or the parent
    const clickedElement = event.target.closest("#mobile-cart") || event.target;
    const page = clickedElement.className.split(" ")[0];
    if (pages[page]) {
        loadPage(page);
        history.pushState({ page }, page, `#${page}`);
    }
});

// Handle browser back/forward buttons
window.addEventListener("popstate", (event) => {
    const page = event.state?.page;
    loadPage(page);
});

// Initial page load
const initialPage = window.location.hash.replace("#", "") || "home";
loadPage(initialPage);

// Add Shop Now button listener
document.addEventListener('click', (event) => {
    if (event.target.id === 'shopNowBtn') {
        event.preventDefault();
        const page = 'shop';
        loadPage(page);
        history.pushState({ page }, page, `#${page}`);
    }
});
