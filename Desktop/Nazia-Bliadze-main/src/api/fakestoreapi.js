const BASE_URL = "https://fakestoreapi.com";

/**
 * @param {string} endpoint
 * @returns {Promise<Array<Object>>}
 */
export async function fetchFakestoreData(endpoint) {
  try {
    const response = await fetch(`${BASE_URL}/${endpoint}`);
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return await response.json();
  } catch (error) {
    console.error(`Fetch failed for ${endpoint}:`, error);
    throw error;
  }
}
