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
    if (pages[page]) {
        try {
            const response = await fetch(pages[page]);
            if (!response.ok) throw new Error("Page not found");
            const html = await response.text();
            content.innerHTML = html;

            // Update navigation active state
            document.querySelectorAll("#navbar a").forEach((link) => {
                link.classList.remove("active");
                if (link.classList.contains(page)) {
                    link.classList.add("active");
                }
            });

            // Update URL without changing history state
            history.replaceState({ page }, page, `/${page}`);
        } catch (error) {
            content.innerHTML = `<h1>Error loading the page</h1>`;
        }
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
        if (!(event.target.className == "logout")) {
            event.preventDefault();
            const page = event.target.className.split(" ")[0]; // Get the first class name
            if (pages[page]) {
                loadPage(page);
                history.pushState({ page }, page, `/${page}`); // Push new state into history
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
        history.pushState({ page }, page, `/${page}`);
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

// Handle browser back/forward buttons and page refresh
window.addEventListener("popstate", (event) => {
    const page = event.state?.page || getPageFromURL();
    handleNavigation(page);
});

// Helper function to get page from URL
function getPageFromURL() {
    const path = window.location.pathname.substring(1);
    if (path.startsWith("product")) {
        const productId = window.location.hash.substring(1);
        return { type: "product", id: productId };
    }
    return path || "home";
}

// Helper function to handle navigation
function handleNavigation(page) {
    if (typeof page === "object" && page.type === "product") {
        loadProductPage(
            `src/controllers/productCont.php?action=view&product_id=${page.id}`,
            page.id
        );
    } else if (pages[page]) {
        loadPage(page);
    } else {
        loadPage("home");
    }
}

// Initial page load
document.addEventListener("DOMContentLoaded", () => {
    const page = getPageFromURL();
    handleNavigation(page);
});

// Add Shop Now button listener
document.addEventListener("click", (event) => {
    if (event.target.id === "contShopBtn") {
        event.preventDefault();
        const page = "shop";
        loadPage(page);
        history.pushState({ page }, page, `${page}`);
    }
    else if (event.target.id === "shopNowBtn") {
        event.preventDefault();
        const page = "shop";
        loadPage(page);
        history.pushState({ page }, page, `${page}`);
    } else if (
        event.target.classList.contains("product-link") ||
        event.target.closest(".product-link")
    ) {
        event.preventDefault();
        const productLink = event.target.classList.contains("product-link")
            ? event.target
            : event.target.closest(".product-link");
        const productId = productLink.dataset.productId;
        loadProductPage(
            `src/controllers/productCont.php?action=view&product_id=${productId}`,
            productId
        );
    }
});

// Update loadProductPage function
async function loadProductPage(page, productId) {
    try {
        const response = await fetch(page);
        if (!response.ok) throw new Error("Page not found");
        const html = await response.text();
        content.innerHTML = html;
        
        // Remove active class from all nav items
        document.querySelectorAll("#navbar a").forEach((link) => {
            link.classList.remove("active");
        });

        // Update URL without changing history state
        const pageName = `product`;
        history.replaceState(
            { page: { type: "product", id: productId } },
            pageName,
            `/product#${productId}`
        );
    } catch (error) {
        content.innerHTML = `<h1>Error loading the page</h1>`;
    }
}
