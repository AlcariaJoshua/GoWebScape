document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll('div#main-menu-container ul li');
  
    menuItems.forEach(item => {
      if (item.querySelector('ul')) {
        item.classList.add('has-submenu');
      }
    });
  });
  




//slider
// Function to initialize the slider and bind arrows
function initializeSliderWithArrows(sliderId, prevArrowSelector, nextArrowSelector) {
  // Make sure the slider is properly initialized with UIkit
  const sliderElement = document.querySelector(sliderId);
  
  if (!sliderElement) {
    console.error(`Slider with ID ${sliderId} not found.`);
    return;
  }

  // Initialize the slider using UIkit.slider
  const slider = UIkit.slider(sliderElement);

  // Bind the previous and next arrows to control the slider
  const prevArrow = document.querySelector(prevArrowSelector);
  const nextArrow = document.querySelector(nextArrowSelector);

  if (prevArrow && nextArrow) {
    prevArrow.addEventListener('click', function (e) {
      e.preventDefault(); // Prevent the default anchor action
      slider.show('previous'); // Navigate to the previous slide (fixed method)
    });

    nextArrow.addEventListener('click', function (e) {
      e.preventDefault(); // Prevent the default anchor action
      slider.show('next'); // Navigate to the next slide (fixed method)
    });
  }
}

// Call the function when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function () {
  // Initialize the slider with the correct parameters
  initializeSliderWithArrows('#values-slider', '.values-btn .uk-slidenav-previous', '.values-btn .uk-slidenav-next');
});



//progess bar
document.addEventListener('DOMContentLoaded', function () {
    const bars = document.querySelectorAll('.js-progressbar');

    bars.forEach((bar, index) => {
        const target = parseInt(bar.getAttribute('data-target'), 10);
        let value = 0;

        // Delay start for each bar by 1 second * index
        setTimeout(() => {
            const interval = setInterval(() => {
                if (value >= target) {
                    clearInterval(interval);
                } else {
                    value++;
                    bar.value = value;
                }
            }, 20); // Adjust for smoother/slower animation
        }, index * 1000); // 1 second interval per bar
    });
});




  
  //counter
  document.addEventListener("DOMContentLoaded", () => {
      const counters = document.querySelectorAll('.counter');
  
      counters.forEach(counter => {
          const updateCount = () => {
              const target = +counter.getAttribute('data-target');
              const current = +counter.innerText;
              const increment = target / 300; // speed of counting
  
              if (current < target) {
                  counter.innerText = Math.ceil(current + increment);
                  setTimeout(updateCount, 20); // smaller = faster
              } else {
                  counter.innerText = target; // fix overshoot
              }
          };
  
          updateCount();
      });
  });


//view more btn
  document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll('.logo-item');
    const loadMoreBtn = document.getElementById('loadMore');
    let visibleCount = 24; // Initially show 4
    const loadStep = 6;   // Show 4 more on each click

    // Initial visibility setup
    items.forEach((item, index) => {
        item.style.display = index < visibleCount ? 'block' : 'none';
    });

    // Load more logic
    loadMoreBtn.addEventListener('click', function (e) {
        e.preventDefault();

        let hiddenItems = Array.from(items).filter(item => item.style.display === 'none');
        hiddenItems.slice(0, loadStep).forEach(item => item.style.display = 'block');

        // Check if everything is now visible
        if (document.querySelectorAll('.logo-item[style*="display: none"]').length === 0) {
            loadMoreBtn.setAttribute('disabled', true);
            loadMoreBtn.innerText = 'All items shown';
            loadMoreBtn.style.cursor = 'not-allowed';
            loadMoreBtn.style.opacity = '0.6';
        }
    });

    // Hide the button if all are visible initially
    if (items.length <= visibleCount) {
        loadMoreBtn.setAttribute('disabled', true);
        loadMoreBtn.style.opacity = '0.6';
        loadMoreBtn.style.cursor = 'not-allowed';
    }
});