export function greetUser() {
  const cookie = document.cookie
    .split("; ")
    .find(row => row.startsWith("user_name="));

  if (cookie) {
    const name = cookie.split("=")[1].replace(/%20/g, " ");
    console.log(`User logged in: ${name}`);
  } else {
    console.log("User not logged in, initiating standard app procedures.");
  }
}
