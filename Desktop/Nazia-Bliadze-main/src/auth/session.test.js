
import { greetUser } from "./session.js";
import { jest, describe, beforeEach, afterEach, test, expect } from '@jest/globals';

describe("greetUser()", () => {
  let spy;

  beforeEach(() => {
    spy = jest.spyOn(console, "log").mockImplementation(() => { });
    document.cookie = "user_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  });

  afterEach(() => spy.mockRestore());

  test("logs username if cookie exists", () => {
    document.cookie = "user_name=John%20Doe";
    greetUser();
    expect(spy).toHaveBeenCalledWith("User logged in: John Doe");
  });

  test("logs default message if no cookie", () => {
    greetUser();
    expect(spy).toHaveBeenCalledWith(
      "User not logged in, initiating standard app procedures."
    );
  });
});
