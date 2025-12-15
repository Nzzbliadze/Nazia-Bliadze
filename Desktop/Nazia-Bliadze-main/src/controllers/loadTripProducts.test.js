/**
 * @jest-environment jsdom
 */
import { jest, describe, test, expect, beforeEach } from '@jest/globals';

describe("loadTripProducts()", () => {
  let loadTripProducts;
  let fetchFakestoreDataMock;

  beforeEach(async () => {
    jest.resetModules(); // Reset cache to ensure fresh mock
    fetchFakestoreDataMock = jest.fn();

    jest.unstable_mockModule("../api/fakestoreapi.js", () => ({
      fetchFakestoreData: fetchFakestoreDataMock
    }));

    const module = await import("../controllers/loadTripProducts.js");
    loadTripProducts = module.loadTripProducts;
  });

  test("renders trip cards when API succeeds", async () => {
    fetchFakestoreDataMock.mockResolvedValue([
      {
        id: 1,
        title: "Trip A",
        price: 100,
        description: "desc",
        category: "electronics",
        image: "img.jpg"
      }
    ]);

    const container = document.createElement("div");

    await loadTripProducts(container);

    // Wait for microtasks to complete (async rendering)
    await new Promise(process.nextTick);

    expect(container.children.length).toBe(1);
    expect(container.innerHTML).toContain("Trip A");
  });

  test("shows error message when API fails", async () => {
    fetchFakestoreDataMock.mockRejectedValue(new Error("API error"));

    const container = document.createElement("div");

    await loadTripProducts(container);

    // Wait for microtasks to complete
    await new Promise(process.nextTick);

    expect(container.innerHTML).toContain(
      "API Error: Could not load trip listings."
    );
  });
});
