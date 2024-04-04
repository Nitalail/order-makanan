const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

document.addEventListener("DOMContentLoaded", function() {
  const burgerBtn = document.getElementById('burger-btn');
  const pizzaBtn = document.getElementById('pizza-btn');
  const cakeBtn = document.getElementById('cake');
  const donatBtn = document.getElementById('donat');
  const hotdogBtn = document.getElementById('hotdog');
  const minumanBtn = document.getElementById('minuman');
  
  burgerBtn.addEventListener('click', function() {
      filterCards('burger');
  });
  pizzaBtn.addEventListener('click', function() {
      filterCards('pizza');
  });
  cakeBtn.addEventListener('click', function() {
      filterCards('cake');
  });
  donatBtn.addEventListener('click', function() {
      filterCards('donat');
  });
  hotdogBtn.addEventListener('click', function() {
      filterCards('hotdog');
  });
  minumanBtn.addEventListener('click', function() {
      filterCards('minuman');
  });

  function filterCards(category) {
      const cards = document.querySelectorAll('.card');
      cards.forEach(function(card) {
          if (card.dataset.category === category || category === 'all') {
              card.style.display = 'block';
          } else {
              card.style.display = 'none';
          }
      });
  }
});

function showPurchaseForm() {
    var form = document.getElementById("purchaseForm");
    form.style.display = "block";
}
