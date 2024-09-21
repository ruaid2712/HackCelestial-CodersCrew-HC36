// Select elements for search and filter functionality
const searchInput = document.getElementById("search");
const locationFilter = document.getElementById("location-filter");
const itemList = document.getElementById("item-list"); // Common list ID for both

// Function to handle searching and filtering
function filterItems(type) {
  const searchTerm = searchInput.value.toLowerCase();
  const selectedLocation = locationFilter.value;

  // Get all items (internships or jobs based on the type)
  const items = document.querySelectorAll(`.${type}-item`); // Specific class for each type

  items.forEach((item) => {
    const title = item.querySelector("h2").textContent.toLowerCase();
    const location = item.getAttribute("data-location");

    // Check if the item matches the search term and location filter
    if (
      title.includes(searchTerm) &&
      (selectedLocation === "" || location === selectedLocation)
    ) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
}

// Current page type setup
const currentPageType = document.body.getAttribute("data-page-type"); // Ensure this is set correctly

// Add event listeners for search and filter
searchInput.addEventListener("input", () => filterItems(currentPageType)); // Use current page type
locationFilter.addEventListener("change", () => filterItems(currentPageType));

// Function to navigate to the details page with the selected item ID and type
function viewDetails(id) {
  if (id) {
    window.location.href = "details.php?id=" + id + "&type=" + currentPageType; // Pass type based on current page
  } else {
    console.error("No ID provided.");
  }
}

// Add event listener to each "View Details" button
document.querySelectorAll(".details-btn").forEach((button) => {
  button.addEventListener("click", function () {
    const itemId = this.getAttribute("data-id");
    viewDetails(itemId);
  });
});

// Sample data for both internships and jobs
const items = {
  // Sample internships
  1: {
    type: "internship",
    title: "Software Development Intern",
    company: "Tech Innovations India",
    location: "Mumbai, MH",
    duration: "3 months",
    description: "Work on cutting-edge technologies.",
    salary: "₹20,000/month",
  },
  // Sample jobs
  3: {
    type: "job",
    title: "Software Engineer",
    company: "InnovateTech",
    location: "Remote",
    duration: "Full-time",
    description: "Develop amazing software solutions.",
    salary: "₹80,000/month",
  },
  // Add more items as needed
};

// Load details if on the details page
const params = new URLSearchParams(window.location.search);
const itemId = params.get("id");
const itemType = params.get("type");

if (itemId && items[itemId]) {
  const item = items[itemId];
  document.getElementById("item-title").textContent = item.title;
  document.getElementById("item-company").textContent = item.company;
  document.getElementById("item-location").textContent = item.location;
  document.getElementById("item-duration").textContent = item.duration;
  document.getElementById("item-description").textContent = item.description;
  document.getElementById("item-salary").textContent = item.salary;
}

// Function to go back to the previous page
function goBack() {
  window.history.back();
}
