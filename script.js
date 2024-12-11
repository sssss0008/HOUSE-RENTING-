// Example JavaScript to load houses
document.addEventListener('DOMContentLoaded', () => {
    fetch('backend/houses.php')
      .then(response => response.json())
      .then(data => {
        const houseContainer = document.getElementById('houses');
        houseContainer.innerHTML = data.map(house => `
          <div class="house-card">
            <img src="assets/images/${house.image}" alt="${house.title}">
            <h3>${house.title}</h3>
            <p>${house.description}</p>
            <p>Price: NPR ${house.price}</p>
          </div>
        `).join('');
      });
  });
  