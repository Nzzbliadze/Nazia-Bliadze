export default class FakestoreEntity {
  #creationDate = new Date();

  constructor(id) {
    this.id = id;
  }

  getAgeInDays() {
    const diff = Date.now() - this.#creationDate;
    return diff === 0 ? 1 : Math.ceil(diff / 86400000);
  }

  displaySummary() {
    return `Entity ID: ${this.id}. Base summary available.`;
  }
}
