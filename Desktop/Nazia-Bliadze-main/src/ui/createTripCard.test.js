
import { createTripCard } from "../ui/createTripCard.js";

describe("createTripCard()", () => {
  test("creates DOM card with correct content", () => {
    const mockTrip = {
      id: 4,
      title: "Mountain Trip",
      price: 199.99,
      category: "outdoor",
      image: "img.jpg",
      tripDuration: "1-Day Hiking Adventure"
    };

    const card = createTripCard(mockTrip);

    expect(card).toBeInstanceOf(HTMLElement);
    expect(card.className).toBe("trip-cards");
    expect(card.innerHTML).toContain("Mountain Trip");
    expect(card.innerHTML).toContain("$199.99");
  });
});
