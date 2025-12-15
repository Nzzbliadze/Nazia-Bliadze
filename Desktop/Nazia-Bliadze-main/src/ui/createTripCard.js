export function createTripCard(trip) {
  const div = document.createElement("div");
  div.className = "trip-cards";

  const lead = trip.id % 4 === 0 ? "Giorgi M." : "Mariam D.";
  const recommended = trip.category.includes("jewelery")
    ? "Formal attire"
    : "Hiking boots, water";

  div.innerHTML = `
    <img src="${trip.image}" />
    <div>${trip.title}</div>
    <p>Duration: ${trip.tripDuration}</p>
    <p>Lead: ${lead}</p>
    <p>Price: $${trip.price.toFixed(2)}</p>
    <p>Recommended: ${recommended}</p>
  `;

  return div;
}
