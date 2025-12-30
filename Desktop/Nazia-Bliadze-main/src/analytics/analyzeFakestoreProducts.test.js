
import { jest, describe, test, expect, beforeEach, afterEach } from '@jest/globals';

describe("analyzeFakestoreProducts()", () => {
  let analyzeFakestoreProducts;
  let fetchFakestoreDataMock;
  let consoleSpy;

  beforeEach(async () => {
    jest.resetModules();
    fetchFakestoreDataMock = jest.fn();
    consoleSpy = jest.spyOn(console, "log").mockImplementation(() => { });

    jest.unstable_mockModule("../api/fakestoreapi.js", () => ({
      fetchFakestoreData: fetchFakestoreDataMock
    }));

    const module = await import("../analytics/analyzeFakestoreProducts.js");
    analyzeFakestoreProducts = module.analyzeFakestoreProducts;
  });

  afterEach(() => {
    consoleSpy.mockRestore();
  });

  test("logs correct analysis values", async () => {
    fetchFakestoreDataMock.mockResolvedValue([
      { price: 50 },
      { price: 150 },
      { price: 200 }
    ]);

    await analyzeFakestoreProducts();

    expect(consoleSpy).toHaveBeenCalledWith("[Analysis] Total Products: 3");

    expect(consoleSpy).toHaveBeenCalledWith("[Analysis] Average Price: $133.33");
  });
});
