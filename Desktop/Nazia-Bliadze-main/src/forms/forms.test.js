import { contactFormProcessor } from "../forms/forms.js";

describe("contactFormProcessor", () => {
  test("returns processed form data with timestamp", () => {
    const result = contactFormProcessor.process(
      "Alice",
      "a@mail.com",
      "Hello",
      "Message"
    );

    expect(result).toMatchObject({
      name: "Alice",
      email: "a@mail.com",
      subject: "Hello",
      message: "Message"
    });

    expect(result.timestamp).toBeDefined();
  });
});
