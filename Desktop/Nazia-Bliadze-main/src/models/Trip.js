import FakestoreEntity from "./FakestoreEntity.js";

export default class Trip extends FakestoreEntity {
  constructor(id, title, price, description, category, image) {
    super(id);
    Object.assign(this, { title, price, description, category, image });
  }

  get tripDuration() {
    if (this.category.includes("electronics")) return "2-Day Tech Trek";
    if (this.category.includes("jewelery")) return "4-Hour Cultural Tour";
    return "1-Day Hiking Adventure";
  }
}
