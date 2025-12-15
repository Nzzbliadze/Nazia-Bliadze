import Trip from "../models/Trip.js";

describe("Trip", () => {
  test("electronics category gives tech trek", () => {
    const trip = new Trip(1, "Tech", 100, "desc", "electronics", "img");
    expect(trip.tripDuration).toBe("2-Day Tech Trek");
  });

  test("jewelery category gives cultural tour", () => {
    const trip = new Trip(2, "Jewels", 50, "desc", "jewelery", "img");
    expect(trip.tripDuration).toBe("4-Hour Cultural Tour");
  });

  test("other categories give hiking adventure", () => {
    const trip = new Trip(3, "Hike", 30, "desc", "outdoor", "img");
    expect(trip.tripDuration).toBe("1-Day Hiking Adventure");
  });
});
