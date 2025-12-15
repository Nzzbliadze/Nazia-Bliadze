import { fetchFakestoreData } from "../api/fakestoreapi.js";

export async function analyzeFakestoreProducts() {
  const products = await fetchFakestoreData("products");
  const total = products.reduce((s, p) => s + p.price, 0);

  console.log(`[Analysis] Total Products: ${products.length}`);
  console.log(`[Analysis] Average Price: $${(total / products.length).toFixed(2)}`);
}
