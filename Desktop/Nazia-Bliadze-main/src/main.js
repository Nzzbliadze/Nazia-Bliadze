import { greetUser } from "./auth/session.js";
import { loadTripProducts } from "./controllers/loadTripProducts.js";
import { analyzeFakestoreProducts } from "./analytics/analyzeFakestoreProducts.js";

document.addEventListener("DOMContentLoaded", () => {
  greetUser();

  const container = document.getElementById("tripsGridContainer");
  if (container) loadTripProducts(container);
});

analyzeFakestoreProducts();
