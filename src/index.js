// ------------------------------------------------------- Use Adobe Font -------------------------------------------------------
(function (d) {
  var config = {
      kitId: "jwo5tro",
      scriptTimeout: 3000,
      async: true,
    },
    h = d.documentElement,
    t = setTimeout(function () {
      h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
    }, config.scriptTimeout),
    tk = d.createElement("script"),
    f = false,
    s = d.getElementsByTagName("script")[0],
    a;
  h.className += " wf-loading";
  tk.src = "https://use.typekit.net/" + config.kitId + ".js";
  tk.async = true;
  tk.onload = tk.onreadystatechange = function () {
    a = this.readyState;
    if (f || (a && a != "complete" && a != "loaded")) return;
    f = true;
    clearTimeout(t);
    try {
      Typekit.load(config);
    } catch (e) {}
  };
  s.parentNode.insertBefore(tk, s);
})(document);

// ------------------------------------------------------- Hamburger Menu -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".header .hamburger-menu");
  const singleProjectHamburger = document.querySelector(
    ".single-project-header .single-project-hamburger-menu"
  );
  const headerHamburger = document.querySelector(
    ".header-mobile-container .hamburger-menu"
  );
  const productPageHeaderHamburger = document.querySelector(
    ".product-page-header .hamburger-menu"
  );
  const newsPageHeaderHamburger = document.querySelector(
    ".news-page-header-mobile .hamburger-menu"
  );
  const flowPageHeaderHamburger = document.querySelector(
    ".flow-page-header .hamburger-menu"
  );
  const hamburgerLogo = document.querySelector(
    ".header .hamburger-logo, .header-mobile-container .hamburger-logo, .single-project-header .hamburger-logo"
  );
  const hamburgerLogoWhite = document.querySelector(
    ".header .hamburger-logo-white, .header-mobile-container .hamburger-logo-white"
  );
  const hamburgerLogoBlack = document.querySelector(
    ".header .hamburger-logo-black, .header-mobile-container .hamburger-logo-black"
  );
  const singleProjecthamburgerLogoBlack = document.querySelector(
    ".single-project-hamburger-logo-black"
  );
  const mobileMenu = document.querySelector(
    ".header .mobile-menu, .single-project-header .mobile-menu"
  );
  const singleProjectMobileMenu = document.querySelector(
    ".single-project-header .mobile-menu"
  );
  const newsContainer = document.getElementById("newsContainer");

  function toggleMenu(menuElement) {
    this.classList.toggle("active");
    hamburgerLogo.classList.toggle("active");
    menuElement.classList.toggle("open");
    document.body.classList.toggle("no-scroll");

    // if (hamburgerLogoWhite) {
    //   hamburgerLogoWhite.classList.toggle("hidden");
    // }

    // if(hamburgerLogoBlack) {
    //   hamburgerLogoBlack.classList.add("visible")

    // }

    // if (hamburgerLogoBlack) {
    //   hamburgerLogoBlack.classList.toggle("visible");
    // }

    if (newsContainer) {
      newsContainer.classList.toggle("hidden");
    }
  }

  if (hamburger && mobileMenu) {
    hamburger.addEventListener("click", function () {
      toggleMenu.call(this, mobileMenu);
    });
  }

  if (singleProjectHamburger && singleProjectMobileMenu) {
    singleProjectHamburger.addEventListener("click", function () {
      toggleMenu.call(this, singleProjectMobileMenu);
      singleProjecthamburgerLogoBlack.classList.toggle("visible");
    });
  }

  if (
    headerHamburger ||
    productPageHeaderHamburger ||
    newsPageHeaderHamburger ||
    flowPageHeaderHamburger
  ) {
    headerHamburger.addEventListener("click", function () {
      toggleMenu.call(this, mobileMenu);
    });
  }
});

// ------------------------------------------------------- HEADER for MOBILE -------------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {
  const headerImage = document.querySelector(".header-img");
  const hamburgerMenu = document.querySelector(".hamburger-menu");
  const hamburgerLogoWhite = document.querySelector(".hamburger-logo-white");
  const hamburgerLogoBlack = document.querySelector(".hamburger-logo-black");
  const whiteHeader = document.querySelector(".white-header.header");
  const hamburgerLogo = document.querySelector(".hamburger-logo");

  // Check if necessary elements are found
  if (
    !headerImage ||
    !whiteHeader ||
    !hamburgerMenu ||
    !hamburgerLogo ||
    !hamburgerLogoWhite ||
    !hamburgerLogoBlack
  ) {
    return;
  }

  // // Initially hide the black logo
  // hamburgerLogoBlack.classList.add("hidden");
  // hamburgerLogoWhite.classList.remove("hidden");

  // Function to check if the header image is in view and update the logo accordingly
  // Function to check if the header image is in view and update the logo accordingly
  function checkScroll() {
    const headerImagePosition = headerImage.getBoundingClientRect().bottom;

    // If the bottom of header-img is above the viewport, show the black logo
    // When header-image is above the viewport (headerImagePosition <= 15)
    if (headerImagePosition <= 40 && headerImagePosition !== 0) {
      if (hamburgerLogo.classList.contains("active")) {
        // When hamburgerLogo has the active class, make the black logo visible and hide the white logo
        hamburgerLogoBlack.classList.remove("hidden");
        hamburgerLogoWhite.classList.add("hidden");
        hamburgerLogoBlack.classList.add("visible");
      } else {
        hamburgerLogoWhite.classList.add("hidden");
        hamburgerLogoBlack.classList.add("visible"); // Only add visible when the logo is not active
      }
      hamburgerMenu.classList.add("black-lines");
      whiteHeader.classList.add("mobile-header-bg-image");
    } else {
      // If the header-image is in the viewport (headerImagePosition > 15)
      if (hamburgerLogo.classList.contains("active")) {
        // When hamburgerLogo has the active class, make the black logo visible and hide the white logo
        hamburgerLogoBlack.classList.remove("hidden");
        hamburgerLogoWhite.classList.add("hidden");
        hamburgerLogoBlack.classList.add("visible");
      } else {
        // Otherwise, show the white logo and hide the black logo
        hamburgerLogoWhite.classList.remove("hidden");
        hamburgerLogoBlack.classList.remove("visible"); // Remove visible when scrolled back
        hamburgerLogoBlack.classList.add("hidden");
      }
      hamburgerMenu.classList.remove("black-lines");
      whiteHeader.classList.remove("mobile-header-bg-image");
    }
  }

  // Function to toggle the active class and manage logo display
  function toggleHamburgerLogo() {
    hamburgerLogo.classList.toggle("active");

    // When hamburger logo is active, remove both logos' visibility toggling via JS
    if (hamburgerLogo.classList.contains("active")) {
      hamburgerLogoWhite.classList.remove("hidden");
      hamburgerLogoBlack.classList.remove("hidden");
    } else {
      // If hamburger logo is not active, check scroll position and update logos accordingly
      checkScroll();
    }
  }

  // Add click event listener to the hamburger logo
  hamburgerLogo.addEventListener("click", toggleHamburgerLogo);

  // Add scroll event listener
  window.addEventListener("scroll", checkScroll);

  // Initial check on page load
  checkScroll();
});

// // ------------------------------------------------------- Photos Filter by Tags -------------------------------------------------------
jQuery(document).ready(function ($) {
  $(".photo-filter-button").on("click", function () {
    const selectedTag = $(this).data("tag");
    if (selectedTag === "all") {
      $(".gallery-item").show();
    } else {
      $(".gallery-item").hide();
      $(".gallery-item").each(function () {
        const tags = $(this).data("tags");
        if (tags && tags.indexOf(selectedTag) !== -1) {
          $(this).show();
        }
      });
    }
  });

  $(".mobile-filter-button").on("click", function (e) {
    e.preventDefault();
    const selectedTag = $(this).data("tag");
	  console.log(selectedTag)
    if (selectedTag === "all") {
      $(".gallery-item").show();
    } else {
      $(".gallery-item").hide();
      $(".gallery-item").each(function () {
        const tags = $(this).data("tags");
        if (tags && tags.indexOf(selectedTag) !== -1) {
          $(this).show();
        }
      });
    }
  });
});


// // ------------------------------------------------------- Functionality for carousel and hotspots -------------------------------------------------------
const slides = Array.from(document.querySelectorAll(".carousel-slide"));

document.addEventListener("DOMContentLoaded", function () {
  let currentIndex = 0;
  const productContainers = document.querySelectorAll(".product-container");
  const content = document.querySelector(".content");

  let captionContainer;
  if (content) {
    captionContainer = content.querySelector(".trim_contents");
  }

  function updateCaption(index) {
    const currentSlide = slides[index];
    const caption = currentSlide.querySelector(".slide-caption");

    if (caption && captionContainer) {
      captionContainer.innerHTML = caption.innerHTML;
      captionContainer.style.display = "block";
    } else if (captionContainer) {
      captionContainer.style.display = "none";
    }
  }

  function goToSlide(index) {
    slides.forEach((slide, i) => {
      if (i !== index) {
        slide.classList.remove("active");
        slide.style.display = "none";
      }
    });

    const currentSlide = slides[index];
    currentSlide.classList.add("active");
    currentSlide.style.display = "block";

    currentIndex = index;
    updateCaption(index);
    handleSlideChange(index);
    addHotspotsForImage(currentSlide);
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % slides.length;
    goToSlide(nextIndex);
  }

  function prevSlide() {
    const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
    goToSlide(prevIndex);
  }

  const nextButton = document.querySelector(".carousel-next");
  const prevButton = document.querySelector(".carousel-prev");
  if (nextButton) {
    nextButton.addEventListener("click", (e) => {
      e.preventDefault();
      nextSlide();
    });
  }

  if (prevButton) {
    prevButton.addEventListener("click", (e) => {
      e.preventDefault();
      prevSlide();
    });
  }

  const carouselElement = document.querySelector(".carousel");
  if (carouselElement) {
    const initialImageId = carouselElement.getAttribute(
      "data-initial-image-id"
    );

    const initialSlideIndex = slides.findIndex(
      (slide) => slide.getAttribute("data-image-id") === initialImageId
    );

    if (initialSlideIndex !== -1) {
      goToSlide(initialSlideIndex);
    } else {
      console.error("Initial image_id not found in slides.");
      goToSlide(0);
    }
  } else {
    console.error("Carousel element not found.");
  }

  function handleSlideChange(currentSlideIndex) {
    const currentSlide = slides[currentSlideIndex];
    const currentSlideImageId = currentSlide.getAttribute("data-image-id");

    productContainers.forEach((productContainer) => {
      const imageId = productContainer.getAttribute("data-image-id");
      productContainer.style.display =
        imageId === currentSlideImageId ? "block" : "none";
    });
  }
});

// // ------------------------------------------------------- Hotspots -------------------------------------------------------
let activeProductInfo = null;

function addHotspotsForImage(slide) {
  const imageId = slide.getAttribute("data-image-id");
  const img = slide.querySelector("img");
  const hotspotContainer = slide.querySelector(".image-hotspots-container");

  if (img && hotspotContainer) {
    // Ensure the hotspot container matches the image size
    hotspotContainer.style.width = `${img.offsetWidth}px`;
    hotspotContainer.style.height = `${img.offsetHeight}px`;

    const hotspots = JSON.parse(
      hotspotContainer.getAttribute("data-hotspots") || "[]"
    );
    hotspotContainer.innerHTML = "";

    hotspots.forEach((hotspot) => {
      const { product, x_position, y_position } = hotspot;
      const hotspotElement = document.createElement("div");
      hotspotElement.classList.add("hotspot");
      hotspotElement.dataset.productId = `product-${product}`;
      hotspotElement.style.left = `${x_position}%`;
      hotspotElement.style.top = `${y_position}%`;
      hotspotContainer.appendChild(hotspotElement);
    });

    hotspotContainer.addEventListener("mouseover", (event) => {
      hotspotContainer.querySelectorAll(".hotspot").forEach((hotspot) => {
        hotspot.style.display = "block";
      });

      if (event.target.classList.contains("hotspot")) {
        const productId = event.target.dataset.productId;
        const productInfo = document.querySelector(
          `.product-container[data-image-id="${imageId}"] .product-info[data-product-id="${productId}"]`
        );

        // Remove the currently active product info
        if (activeProductInfo && activeProductInfo !== productInfo) {
          activeProductInfo.classList.remove("active");
        }

        if (productInfo && productInfo !== activeProductInfo) {
          setTimeout(() => {
            productInfo.classList.add("active");
          }, 0);
          activeProductInfo = productInfo;
        }
      }
    });

    hotspotContainer.addEventListener("mouseout", (event) => {
      hotspotContainer.querySelectorAll(".hotspot").forEach((hotspot) => {
        hotspot.style.display = "none";
      });

      if (event.target.classList.contains("hotspot")) {
        const productId = event.target.dataset.productId;
        const productInfo = document.querySelector(
          `.product-container[data-image-id="product-${imageId}"] .product-info[data-product-id="${productId}"]`
        );

        if (productInfo && productInfo !== activeProductInfo) {
          setTimeout(() => {
            productInfo.classList.remove("active");
          }, 300);
        }
        if (activeProductInfo === productInfo) {
          activeProductInfo = null;
        }
      }
    });
  }
}

// Call this function on page load and whenever the image size might change
window.addEventListener("load", () => {
  const slides = document.querySelectorAll(".carousel-slide");
  slides.forEach(addHotspotsForImage);
});

// ------------------------------------------------------- Projects grid layout change -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const twoColumnWhite = document.getElementById("two-column-white");
  const twoColumnBlack = document.getElementById("two-column-black");
  const threeColumnWhite = document.getElementById("three-column-white");
  const threeColumnBlack = document.getElementById("three-column-black");
  const projectsContainer = document.querySelector(".projects-container");
  const projectPhotoChange = document.querySelector(".project-photo-change");

  function toggleColumns(columnType) {
    if (projectsContainer) {
      if (columnType === "two") {
        projectsContainer.classList.remove("grid-three-column");
        projectsContainer.classList.add("grid-two-column");

        twoColumnWhite.style.display = "none";
        twoColumnBlack.style.display = "block";
        threeColumnWhite.style.display = "block";
        threeColumnBlack.style.display = "none";
      } else if (columnType === "three") {
        projectsContainer.classList.remove("grid-two-column");
        projectsContainer.classList.add("grid-three-column");
        projectPhotoChange.classList.add("project-photo-change-design");

        threeColumnWhite.style.display = "none";
        threeColumnBlack.style.display = "block";
        twoColumnWhite.style.display = "block";
        twoColumnBlack.style.display = "none";
      }
    }
  }

  if (twoColumnWhite) {
    twoColumnWhite.addEventListener("click", function () {
      toggleColumns("two");
    });
  }

  if (threeColumnWhite) {
    threeColumnWhite.addEventListener("click", function () {
      toggleColumns("three");
    });
  }

  if (twoColumnBlack) {
    twoColumnBlack.addEventListener("click", function () {
      toggleColumns("two");
    });
  }

  if (threeColumnBlack) {
    threeColumnBlack.addEventListener("click", function () {
      toggleColumns("three");
    });
  }
});

// ------------------------------------------------------- Projects filter -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(
    ".project-filter-button, .project-filter-mobile-button"
  );
  const projects = document.querySelectorAll(".projects");
  let noProjectsMessage = document.querySelector(".no-projects-message");
  const projectsContainer = document.querySelector(".projects-container");

  // Create the no-projects-message div if it doesn't exist
  if (projectsContainer) {
    if (!noProjectsMessage) {
      noProjectsMessage = document.createElement("div");
      noProjectsMessage.classList.add("no-projects-message");
      noProjectsMessage.textContent = "プロジェクトは準備中です。";
      noProjectsMessage.style.display = "none";
      projectsContainer.appendChild(noProjectsMessage);
    }
  } else {
    console.error("Projects container element not found");
  }

  // Get the filter parameter from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const filter = urlParams.get("filter") || "all";

  // Remove the active class from all buttons
  filterButtons.forEach((button) => button.classList.remove("active"));

  // Add the active class to both PC and mobile filter buttons that match the filter
  document
    .querySelectorAll(
      `.project-filter-button[data-filter="${filter}"], .project-filter-mobile-button[data-filter="${filter}"]`
    )
    .forEach((button) => button.classList.add("active"));

  // Add click event listeners to all filter buttons
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const filter = button.getAttribute("data-filter");

      // Remove the active class from all buttons
      filterButtons.forEach((btn) => btn.classList.remove("active"));

      // Add the active class to all buttons matching the clicked filter
      document
        .querySelectorAll(
          `.project-filter-button[data-filter="${filter}"], .project-filter-mobile-button[data-filter="${filter}"]`
        )
        .forEach((btn) => btn.classList.add("active"));

      let hasVisibleProjects = false;

      projects.forEach((project) => {
        const projectClasses = project.className
          .split(" ")
          .map((cls) => cls.trim());

        if (filter === "all") {
          project.style.display = "block";
          hasVisibleProjects = true;
        } else {
          if (projectClasses.includes(filter)) {
            project.style.display = "block";
            hasVisibleProjects = true;
          } else {
            project.style.display = "none";
          }
        }
      });

      if (hasVisibleProjects) {
        noProjectsMessage.style.display = "none";
      } else {
        noProjectsMessage.style.display = "block";
      }
    });
  });

  // Apply the filter on page load based on URL parameter
  if (filter) {
    const filterButton = document.querySelector(
      `.project-filter-button[data-filter="${filter}"], .project-filter-mobile-button[data-filter="${filter}"]`
    );

    if (filterButton) {
      filterButton.click();
    }
  }
});

// ------------------------------------------------------- Projects filter Scroll Detection -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const projectFilter = document.querySelector(".project-filter");
  const projectFilterButtonContainer = document.querySelector(
    ".project-filter-button-container"
  );
  const projectsContainer = document.querySelector(".projects-container");
  const projects = document.querySelectorAll(".projects");

  if (!projectFilter || !projectFilterButtonContainer || !projectsContainer) {
    console.error("Required elements not found on the page.");
    return;
  }

  function handleScroll() {
    const filterRect = projectFilterButtonContainer.getBoundingClientRect();
    const projectsRect = projectsContainer.getBoundingClientRect();

    if (
      filterRect.bottom <= projectsRect.top ||
      filterRect.bottom >= projectsRect.bottom
    ) {
      projectFilter.style.visibility = "hidden";
    } else {
      projectFilter.style.visibility = "visible";
    }
  }

  // Use IntersectionObserver to observe the button container
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          projectFilter.style.visibility = "visible";
        } else {
          projectFilter.style.visibility = "hidden";
        }
      });
    },
    {
      root: null, // Use the viewport as the root
      threshold: [0, 1], // Observe when element is fully in/out of view
    }
  );

  observer.observe(projectFilterButtonContainer);

  window.addEventListener("scroll", handleScroll);
  window.addEventListener("resize", handleScroll);

  handleScroll();

  // Ensure the project filter is always displayed even if there are no projects
  if (projects.length === 0) {
    projectFilter.style.visibility = "visible";
  }

  // Initial setup for no projects message
  let noProjectsMessage = document.querySelector(".no-projects-message");
  if (!noProjectsMessage) {
    noProjectsMessage = document.createElement("div");
    noProjectsMessage.classList.add("no-projects-message");
    noProjectsMessage.textContent = "プロジェクトは準備中です。";
    noProjectsMessage.style.display = "none";
    projectsContainer.appendChild(noProjectsMessage);
  }

  // Function to apply filter
  function applyFilter(filter) {
    let hasVisibleProjects = false;

    projects.forEach((project) => {
      const projectClasses = project.className
        .split(" ")
        .map((cls) => cls.trim());

      if (filter === "all") {
        project.style.display = "block";
        hasVisibleProjects = true;
      } else {
        if (projectClasses.includes(filter)) {
          project.style.display = "block";
          hasVisibleProjects = true;
        } else {
          project.style.display = "none";
        }
      }
    });

    if (hasVisibleProjects) {
      noProjectsMessage.style.display = "none";
    } else {
      noProjectsMessage.style.display = "block";
    }
  }

  // Get the filter parameter from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const filter = urlParams.get("filter") || "all";

  // Add click event listeners to all filter buttons
  const filterButtons = document.querySelectorAll(
    ".project-filter-button, .project-filter-mobile-button"
  );
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const filter = button.getAttribute("data-filter");

      // Remove the active class from all buttons
      filterButtons.forEach((btn) => btn.classList.remove("active"));

      // Add the active class to all buttons matching the clicked filter
      document
        .querySelectorAll(
          `.project-filter-button[data-filter="${filter}"], .project-filter-mobile-button[data-filter="${filter}"]`
        )
        .forEach((btn) => btn.classList.add("active"));

      applyFilter(filter);

      window.scrollTo({ top: 781, behavior: "smooth" });
    });
  });

  // Apply the filter on page load based on URL parameter
  applyFilter(filter);
});

// ------------------------------------------------------- Photo filter Scroll Detection -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const photoFilter = document.querySelector(".photo-filter");
  const photoFilterButtonContainer = document.querySelector(
    ".photo-filter-button-container"
  );
  const photoContainer = document.querySelector(".custom-gallery");

  // Ensure elements are available before proceeding
  if (!photoFilter || !photoFilterButtonContainer || !photoContainer) {
    console.error("One or more required elements are missing from the page.");
    return;
  }

  function handleScroll() {
    const photoFilterRect = photoFilterButtonContainer.getBoundingClientRect();
    const photosRect = photoContainer.getBoundingClientRect();

    if (photoFilterRect.top < photosRect.top || photoFilterRect.bottom <= 200) {
      photoFilter.style.visibility = "hidden";
    } else {
      photoFilter.style.visibility = "visible";
    }
  }

  // Use IntersectionObserver to handle visibility changes
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          photoFilter.style.visibility = "visible";
        } else {
          photoFilter.style.visibility = "hidden";
        }
      });
    },
    {
      root: null, // Use the viewport as the root
      threshold: [0, 1], // Observe when element is fully in/out of view
    }
  );

  observer.observe(photoFilterButtonContainer);

  // Add event listeners
  window.addEventListener("scroll", handleScroll);
  window.addEventListener("resize", handleScroll);

  // Initial check to set visibility on page load
  handleScroll();
});

// ------------------------------------------------------- HEADER AND FOOTER -------------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {
  const headerContainer = document.querySelector(".header-container");
  const headerMobileContainer = document.querySelector(
    ".header-mobile-container"
  );
  const banner = document.querySelector(".header-img");
  const logoOverMainPic = document.querySelector(".logo-over-main-pic");
  const footerContainer = document.querySelector(".footer-container");

  if (document.body.classList.contains("single-project-details-page")) {
    if (headerContainer) headerContainer.style.display = "none";
    if (headerMobileContainer) headerMobileContainer.style.display = "none";
    if (footerContainer) footerContainer.style.display = "none";
    return;
  }

  let bannerEndOffset = 0;

  function calculateBannerEndOffset() {
    if (banner) {
      requestAnimationFrame(() => {
        bannerEndOffset = banner.offsetTop + banner.offsetHeight - 98;
        handleScroll();
      });
    } else {
      console.error("Banner element not found.");
    }
  }

  calculateBannerEndOffset();

  window.addEventListener("resize", calculateBannerEndOffset);
  window.addEventListener("load", calculateBannerEndOffset);

  function handleScroll() {
    const currentScroll =
      window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll >= bannerEndOffset) {
      // Show the header and add fixed class to logoOverMainPic
      if (headerContainer) headerContainer.classList.add("show");
      if (headerMobileContainer) headerMobileContainer.classList.add("show");
      if (logoOverMainPic) logoOverMainPic.classList.remove("fixed");
    } else {
      // Hide the header and remove fixed class from logoOverMainPic
      if (headerContainer) headerContainer.classList.remove("show");
      if (headerMobileContainer) headerMobileContainer.classList.remove("show");
      if (logoOverMainPic) logoOverMainPic.classList.add("fixed");
    }
  }

  let scrollTimeout;
  window.addEventListener("scroll", function () {
    if (scrollTimeout) {
      clearTimeout(scrollTimeout);
    }
    scrollTimeout = setTimeout(handleScroll, 10);
  });

  handleScroll();
});

// ------------------------------------------------------- FILTER BY TAGS -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(".photo-filter-button");
  const filterButtonsMobile = document.querySelectorAll(".mobile-filter-button");
  const galleryItems = document.querySelectorAll(".gallery-item");

  // Set active class for the selected button
  function setActiveButton(tag) {
    filterButtons.forEach((btn) => {
      if (btn.getAttribute("data-tag") === tag) {
        btn.classList.add("active");
      } else {
        btn.classList.remove("active");
      }
    });

    filterButtonsMobile.forEach((btn) => {
      if (btn.getAttribute("data-tag") === tag) {
        btn.classList.add("active");
      } else {
        btn.classList.remove("active");
      }
    });
  }

  // Event listeners for desktop filter buttons
  if (filterButtons.length > 0) {
    filterButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const selectedTag = this.getAttribute("data-tag");
        setActiveButton(selectedTag);
        filterGallery(selectedTag);
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    });
  } else {
    console.error("No filter buttons found.");
  }

  // Event listeners for mobile filter buttons
  if (filterButtonsMobile.length > 0) {
    filterButtonsMobile.forEach((button) => {
      button.addEventListener("click", function () {
        const selectedTag = this.getAttribute("data-tag");
        setActiveButton(selectedTag);
        filterGallery(selectedTag);
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    });
  } else {
    console.error("No mobile filter buttons found.");
  }

  // Filter gallery items based on the selected tag
  function filterGallery(selectedTag) {
    galleryItems.forEach((item) => {
      try {
        const itemTags = JSON.parse(item.getAttribute("data-tags") || "[]");
        if (selectedTag === "all" || itemTags.includes(selectedTag)) {
          item.style.display = "grid";
        } else {
          item.style.display = "none";
        }
      } catch (error) {
        console.error("Error parsing tags:", error);
      }
    });
  }

  // Initialize the filter by showing all items
  filterGallery("all");
});

// ------------------------------------------------------- PRODUCT MODAL -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
	 // Select all elements that trigger the modal opening (jump from frontpage)
   const triggers = document.querySelectorAll(".category-link.navigate-link");

  triggers.forEach(function(trigger) {
    trigger.addEventListener("click", function(event) {
      event.preventDefault();

      const categoryId = this.getAttribute("data-category-id");
      const url = new URL(window.location);

      url.pathname = "/products/";
      url.searchParams.set("categoryId", categoryId);
		
      // Navigate to the new URL
      window.location.href = url.toString();
    });
  });
	
  // Close modal function
  function closeModal(modal) {
    if (modal) modal.style.display = "none";
    document.body.style.overflow = "";
  }

  // Open modal function
  function openModal(modal, categoryId) {
    document.querySelectorAll(".modal").forEach(function (m) {
      m.style.display = "none";
    });

    if (modal) {
      modal.style.display = "block";
      document.body.style.overflow = "hidden";
      updateLargeImage(modal);
      selectFirstProductItem(modal);

      const newUrl = `${window.location.pathname}?categoryId=${categoryId}`;
      history.pushState({ categoryId: categoryId }, "", newUrl);
    }
  }

  // Close modal when the close button is clicked
  let closeButtons = document.querySelectorAll(".modal .close");
  closeButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
		event.preventDefault();
		
      const modal = button.closest(".modal");
      closeModal(modal);

      // Remove categoryId from the URL
      const url = window.location.href;
      const newUrl = url
        .replace(/([?&])categoryId=[^&]*/, "$1")
        .replace(/[?&]$/, "");
      if (url !== newUrl) {
        history.replaceState({}, "", newUrl);
      }
    });

    button.addEventListener("touchstart", function (event) {
		event.preventDefault();
		
      const modal = button.closest(".modal");
      closeModal(modal);

      // Remove categoryId from the URL
      const url = window.location.href;
      const newUrl = url
        .replace(/([?&])categoryId=[^&]*/, "$1")
        .replace(/[?&]$/, "");
      if (url !== newUrl) {
        history.replaceState({}, "", newUrl);
      }
    });
  });

  // Close modal when clicking outside the modal content
  window.addEventListener("click", function (event) {
    if (event.target.classList.contains("modal")) {
      closeModal(event.target);

      // Remove categoryId from the URL
      const url = window.location.href;
      const newUrl = url
        .replace(/([?&])categoryId=[^&]*/, "$1")
        .replace(/[?&]$/, "");
      if (url !== newUrl) {
        history.replaceState({}, "", newUrl);
      }
    }
  });

  // Update large image when category link is clicked
  const productLinks = document.querySelectorAll(".product-link");

  productLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      
      const fullImageUrl = this.getAttribute("data-full-image");
      const productInfo = this.getAttribute("data-title")
      const modal = this.closest(".modal");
      const largeImage = modal.querySelector(".large-image-container img");
      const productItems = modal.querySelectorAll(".product-item");
      const productDescription = modal.querySelector(".product-list-item-description h3")

      // Remove "selected" class from all product items
      productItems.forEach((item) => item.classList.remove("selected"));

      // Add "selected" class to the clicked product item
      this.closest(".product-item").classList.add("selected");

//       largeImage.src = fullImageUrl;
      productDescription.textContent = productInfo;

      // Create an image object to check the dimensions
      const img = new Image();
      img.src = fullImageUrl;

      img.onload = function () {
        const width = img.width;
        const height = img.height;
        const isPortrait = width < height;
        const itemCount = productItems.length;

        // Set the large image src after determining the size
        largeImage.src = fullImageUrl;
		  
        // Check the window width
        const windowWidth = window.innerWidth;

        // Check if the image is landscape or portrait and set maxWidth accordingly
        if (isPortrait) {
          if (windowWidth > 1024) {
            if (itemCount === 1) {
              largeImage.style.maxWidth = "50%";
            } else if (itemCount >= 2) {
              largeImage.style.maxWidth = "38%";
            } else {
              largeImage.style.maxWidth = "auto";
            }
          } else {
            largeImage.style.maxWidth = "";
          }
        } else {
          // Landscape
          if (windowWidth > 1024) {
            largeImage.style.maxWidth = "75%";
          } else {
            largeImage.style.maxWidth = "";
          }
        }
      };
    });
  });

  // Function to update large image dimensions when modal is opened
  function updateLargeImage(modal) {
    const largeImage = modal.querySelector(".large-image-container img");
    const productItems = modal.querySelectorAll(".product-item");

    // if (largeImage) {
    // Create an image object to check the dimensions
    const img = new Image();
    img.src = largeImage.src;

    img.onload = function () {
      const width = img.width;
      const height = img.height;
      const isPortrait = width < height;
      const itemCount = productItems.length;

      // Check the window width
      const windowWidth = window.innerWidth;

      // Check if the image is landscape or portrait and set maxWidth accordingly
      if (isPortrait) {
        if (windowWidth > 1024) {
          if (itemCount === 1) {
            largeImage.style.maxWidth = "50%";
          } else if (itemCount >= 2) {
            largeImage.style.maxWidth = "38%";
          } else {
            largeImage.style.maxWidth = "auto";
          }
        } else {
          largeImage.style.maxWidth = "";
        }
      } else {
        // Landscape
        if (windowWidth > 1024) {
          largeImage.style.maxWidth = "75%";
        } else {
          largeImage.style.maxWidth = "";
        }
      }
    };
    // }
  }

  // Function to add "selected" class to the first product item
  function selectFirstProductItem(modal) {
    const firstProductItem = modal.querySelector(".product-item");
    if (firstProductItem) {
      firstProductItem.classList.add("selected");
    }
  }

  // Display only the large image if there's only one product in the category
  const modalSections = document.querySelectorAll(".modal");

  modalSections.forEach((modal) => {
    const productItems = modal.querySelectorAll(".product-item");

    if (productItems.length === 1) {
      const smallImageContainer = modal.querySelector(
        ".single-product-description"
      );
      const largeImageContainer = modal.querySelector(".large-image-container");

      if (smallImageContainer) {
        smallImageContainer.style.display = "none";
      }

      if (largeImageContainer) {
        largeImageContainer.style.display = "block";
      }
    }
  });

  // Function to add carousel controls (< and >) in mobile view
  function addCarouselControls(modal) {
    const largeImageContainer = modal.querySelector(".large-image-container");
    const largeImageContainerImages = largeImageContainer.querySelectorAll("img");

    if ((window.innerWidth < 1024) && (largeImageContainerImages.length > 1)) {
      // Check if controls are already added to avoid duplication
      if (
        !largeImageContainer.querySelector(".carousel-prev") &&
        !largeImageContainer.querySelector(".carousel-next")
      ) {
        // Create left arrow
        const prevArrow = document.createElement("span");
        prevArrow.classList.add("carousel-prev");
        prevArrow.textContent = "<";

        // Create right arrow
        const nextArrow = document.createElement("span");
        nextArrow.classList.add("carousel-next");
        nextArrow.textContent = ">";

        // Insert them at the beginning and end of the product list carousel
        largeImageContainer.insertBefore(
          prevArrow,
          largeImageContainer.firstChild
        );
        largeImageContainer.appendChild(nextArrow);

        prevArrow.addEventListener("click", function () {
          moveCarousel(modal, "prev");
        });

        nextArrow.addEventListener("click", function () {
          moveCarousel(modal, "next");
        });
      }
    }
  }

  function moveCarousel(modal, direction) {
    const largeImageContainer = modal.querySelector(".large-image-container");
    const largeImages = largeImageContainer.querySelectorAll("img");

    // Retrieve current index from data attribute
    let currentIndex = parseInt(
      largeImageContainer.getAttribute("data-current-index")
    );

    if (direction === "next") {
      // Move to the next image
      currentIndex = (currentIndex + 1) % largeImages.length;
    } else if (direction === "prev") {
      // Move to the previous image
      currentIndex =
        (currentIndex - 1 + largeImages.length) % largeImages.length;
    }

    // Show the current image and hide others
    largeImages.forEach((img, index) => {
      img.style.display = index === currentIndex ? "block" : "none";
    });

    // Update the current index in the data attribute
    largeImageContainer.setAttribute("data-current-index", currentIndex);
  }

  // Initialize carousel when in mobile view (window.innerWidth < 600)
  function initializeCarousel(modal) {
    const productItems = modal.querySelectorAll(".product-item img");
    const largeImageContainer = modal.querySelector(".large-image-container");

    // Hide the original large image
    const largeImage = modal.querySelector("#large-image");

    if (largeImage) {
      largeImage.style.display = "none";
    }

    // Show the large image container (flex display for carousel)
    if (largeImageContainer) {
      largeImageContainer.style.display = "flex";
    }

    // Create and store all large images
    const largeImages = Array.from(productItems).map((smallImg, index) => {
      const largeImgSrc = smallImg.getAttribute("src");
      const largeImg = document.createElement("img");
      largeImg.src = largeImgSrc;
      largeImg.style.display = "none";
      largeImg.setAttribute("data-index", index);
      return largeImg;
    });

    // Clear the container and append all large images
    if (largeImageContainer) {
      largeImageContainer.innerHTML = "";
      largeImages.forEach((img) => {
        largeImageContainer.appendChild(img);
      });

      // Show the first image by default
      largeImages[0].style.display = "block";

      // Set initial current index in the data attribute
      largeImageContainer.setAttribute("data-current-index", 0);
    }

    // Swipe functionality for touch devices
    let touchStartX = 0;
    let touchEndX = 0;
    const threshold = 50;

    largeImageContainer.addEventListener("touchstart", function (event) {
      touchStartX = event.touches[0].clientX;
    });

    largeImageContainer.addEventListener("touchend", function (event) {
      touchEndX = event.changedTouches[0].clientX;
      handleSwipe();
    });

    function handleSwipe() {
      if (touchEndX < touchStartX - threshold) {
        moveCarousel(modal, "next");
      } else if (touchEndX > touchStartX + threshold) {
        moveCarousel(modal, "prev");
      }
    }

    addCarouselControls(modal);
  }

  // Add event listener for category link click to initialize carousel
  const categoryLinks = document.querySelectorAll(".category-link.modal-link");
  categoryLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();

      const categoryId = this.getAttribute("data-category-id");
      const modal = document.getElementById(categoryId);
      openModal(modal, categoryId);
    });
  });

  // Initialize carousel for each modal
  modalSections.forEach((modal) => {
    initializeCarousel(modal);
  });

  const urlParams = new URLSearchParams(window.location.search);
  const categoryIdFromUrl = urlParams.get("categoryId");

  if (categoryIdFromUrl) {
    const modal = document.getElementById(categoryIdFromUrl);
    openModal(modal, categoryIdFromUrl);
  }
});

// ------------------------------------------------------- FONT WEIGHT CHANGE ON PROJECTS -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const currentPath = window.location.pathname;

  const projectsLink = document.querySelector(".projects-link");
  const sceneLink = document.querySelector(".scene-link-photos");

  if (currentPath.includes("/projects")) {
    projectsLink.style.fontWeight = "600";
  } else if (currentPath.includes("/photos")) {
    sceneLink.style.fontWeight = "600";
  } else {
    console.error("No such a style");
  }
});

// ------------------------------------------------------- PROJECT / SCENE PAGE SCROLLING -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const projectButton = document.querySelector(".projects-link");
  const sceneButton = document.querySelector(".scene-link-photos");

  function navigateToWithScroll(e, targetUrl) {
    e.preventDefault();

    // Add query parameter to the URL to indicate scroll action
    const urlWithScroll = new URL(targetUrl, window.location.origin);
    urlWithScroll.searchParams.set("scroll", "true");

    // Navigate to the target URL
    window.location.href = urlWithScroll;
  }

  if (projectButton) {
    projectButton.addEventListener("click", function (e) {
      navigateToWithScroll(e, projectButton.href);
    });
  }

  if (sceneButton) {
    sceneButton.addEventListener("click", function (e) {
      navigateToWithScroll(e, sceneButton.href);
    });
  }

  function handleScroll() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has("scroll")) {
      // Find the correct header element
      const headerBanner =
        document.querySelector(".project-header-img") ||
        document.querySelector(".header-img");
      const bannerHeight = headerBanner ? headerBanner.offsetHeight : 0;

      // Scroll to the position under the header
      window.scrollTo({
        top: bannerHeight,
        behavior: "smooth",
      });

      // Remove the scroll parameter from the URL
      urlParams.delete("scroll");
      const newUrl =
        window.location.pathname +
        (urlParams.toString() ? `?${urlParams.toString()}` : "");
      window.history.replaceState({}, "", newUrl);
    }
  }

  // Execute scrolling if needed
  window.addEventListener("load", handleScroll);
});

// // ------------------------------------------------------- Scroll-up functionality -------------------------------------------------------
let scrollAnimationElement = document.querySelectorAll(".scroll-up");

let scrollAnimationFunction = function () {
  for (let i = 0; i < scrollAnimationElement.length; i++) {
    let triggerMargin = 100;
    if (
      window.innerHeight >
      scrollAnimationElement[i].getBoundingClientRect().top + triggerMargin
    ) {
      scrollAnimationElement[i].classList.add("on");
    }
  }
};

// Run the scroll animation function on page load and on scroll
window.addEventListener("load", scrollAnimationFunction);
window.addEventListener("scroll", scrollAnimationFunction);

jQuery(document).ready(function ($) {
  $(function () {
    $("body").fadeIn(1000);
  });
});

// // ------------------------------------------------------- Lazy-load functionality -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  function loadImage(image) {
    const src = image.getAttribute("data-src");

    if (src) {
      const tempImg = new Image();
      tempImg.src = src;

      tempImg.onload = () => {
        image.src = src;
        image.removeAttribute("data-src");

        requestAnimationFrame(() => {
          image.classList.remove("hidden");
          image.classList.add("front-lazy-loaded");
        });
      };

      tempImg.onerror = () => {
        console.error(`Failed to load image: ${src}`);
      };
    } else {
      console.error("data-src attribute is missing.");
    }
  }

  function handleIntersect(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const images = entry.target.querySelectorAll("img.lazy");
        images.forEach((img) => loadImage(img));
        observer.unobserve(entry.target);
      }
    });
  }

  const observer = new IntersectionObserver(handleIntersect, {
    root: null,
    rootMargin: "10px",
    threshold: 0.1,
  });

  const targets = document.querySelectorAll(".gallery-item");

  if (targets.length === 0) {
    console.error("No targets found for the observer.");
  } else {
    targets.forEach((target) => observer.observe(target));
  }

  // Fallback mechanism to manually load images if IntersectionObserver does not trigger
  const lazyImages = document.querySelectorAll("img.lazy");
  lazyImages.forEach((img) => {
    if (img.classList.contains("hidden")) {
      loadImage(img);
    }
  });
});




// // ------------------------------------------------------- Hotspot Adjustment functionality -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  var hotspots = document.querySelectorAll(".hotspot-project-archive");

  hotspots.forEach(function (hotspot) {
    if (hotspot.getAttribute("data-manual") === "true") {
      return; // Skip manual hotspots
    }

    var xPosition = parseFloat(hotspot.getAttribute("data-x-position"));
    var yPosition = parseFloat(hotspot.getAttribute("data-y-position"));

    // Apply the final positions in percentages
    hotspot.style.left = xPosition + "%";
    hotspot.style.top = yPosition + "%";
  });
});


// // ------------------------------------------------------- Display "Display Order" at Projects List on Admin Page functionality -------------------------------------------------------
jQuery(document).ready(function ($) {
  // Extend inline edit post
  let $wp_inline_edit = inlineEditPost.edit;
  inlineEditPost.edit = function (id) {
    $wp_inline_edit.apply(this, arguments);

    let post_id = 0;
    if (typeof id === "object") {
      post_id = parseInt(this.getId(id));
    }

    if (post_id > 0) {
      let $edit_row = $("#edit-" + post_id),
        $custom_order = $("#custom-order-" + post_id).text();

      $edit_row.find('input[name="custom_order"]').val($custom_order);
    }
  };

  $("#bulk_edit").on("click", function () {
    let $bulk_row = $("#bulk-edit"),
      $post_ids = [];

    $bulk_row
      .find("#bulk-titles")
      .children()
      .each(function () {
        $post_ids.push(
          $(this)
            .attr("id")
            .replace(/^(ttle)/i, "")
        );
      });

    let $custom_order = $bulk_row.find('input[name="custom_order"]').val();

    $.each($post_ids, function (index, post_id) {
      $("#custom-order-" + post_id).text($custom_order);
    });
  });
});

// // ------------------------------------------------------- Scene row-first layout -------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const gallery = document.querySelector(".custom-gallery");
  const items = Array.from(gallery.children);
  const columns = 3;
  const rows = Math.ceil(items.length / columns);
  let reorderedItems = [];

  // Reorder items in a row-first manner
  for (let r = 0; r < rows; r++) {
    for (let c = 0; c < columns; c++) {
      const index = r * columns + c;
      if (index < items.length) {
        reorderedItems.push(items[index]);
      }
    }
  }

  // Append reordered items back to the gallery in a column-first manner
  gallery.innerHTML = "";
  for (let c = 0; c < columns; c++) {
    for (let r = 0; r < rows; r++) {
      const index = r * columns + c;
      if (index < reorderedItems.length) {
        gallery.appendChild(reorderedItems[index]);
      }
    }
  }
});

// // ------------------------------------------------------- Scene page-loader -------------------------------------------------------
const loader = document.getElementById("js-loader");

window.addEventListener("load", function () {
  const ms = 400;

  const loaderOpacity = function () {
    loader.style.opacity = 0;
  };

  const loaderDisplay = function () {
    loader.style.display = "none";
  };

  setTimeout(loaderOpacity, 1000);
  setTimeout(loaderDisplay, 1000 + ms);
});
