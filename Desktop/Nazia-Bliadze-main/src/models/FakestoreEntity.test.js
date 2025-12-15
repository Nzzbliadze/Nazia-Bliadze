import FakestoreEntity from "../models/FakestoreEntity.js";

describe("FakestoreEntity", () => {
  test("getAgeInDays returns >= 1", () => {
    const entity = new FakestoreEntity(1);
    expect(entity.getAgeInDays()).toBeGreaterThanOrEqual(1);
  });

  test("displaySummary returns correct text", () => {
    const entity = new FakestoreEntity(7);
    expect(entity.displaySummary()).toBe(
      "Entity ID: 7. Base summary available."
    );
  });
});
