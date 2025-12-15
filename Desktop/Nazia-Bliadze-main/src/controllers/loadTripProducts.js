import { fetchFakestoreData } from "../api/fakestoreapi.js";
import Trip from "../models/Trip.js";
import { createTripCard } from "../ui/createTripCard.js";

export async function loadTripProducts(container) {
  container.innerHTML = "<h4>Loading trips...</h4>";

  try {
    const products = await fetchFakestoreData("products");
    container.innerHTML = "";

    products.forEach(product => {
      const trip = new Trip(
        product.id,
        product.title,
        product.price,
        product.description.slice(0, 150) + "...",
        product.category,
        product.image
      );

      container.appendChild(createTripCard(trip));
    });
  } catch {
    container.innerHTML =
      "<h4>API Error: Could not load trip listings.</h4>";
  }
}
