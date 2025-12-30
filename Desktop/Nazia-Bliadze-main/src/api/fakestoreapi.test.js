
import { jest, describe, test, expect, beforeEach, afterEach } from '@jest/globals';
import { fetchFakestoreData } from './fakestoreapi.js';

describe('fetchFakestoreData', () => {
  let originalFetch;

  beforeEach(() => {
    originalFetch = global.fetch;
  });

  afterEach(() => {
    global.fetch = originalFetch;
  });

  test('returns data when fetch is successful', async () => {
    const mockData = [{ id: 1, title: 'Test Product' }];
    const mockResponse = {
      ok: true,
      json: async () => mockData,
    };
    global.fetch = jest.fn().mockResolvedValue(mockResponse);

    const data = await fetchFakestoreData('products');
    expect(data).toEqual(mockData);
    expect(global.fetch).toHaveBeenCalledWith('https://fakestoreapi.com/products');
  });

  test('throws error when response is not ok', async () => {
    const mockResponse = {
      ok: false,
      status: 404,
    };
    global.fetch = jest.fn().mockResolvedValue(mockResponse);

    await expect(fetchFakestoreData('products')).rejects.toThrow('HTTP error! Status: 404');
  });

  test('throws error when fetch fails network-wise', async () => {
    global.fetch = jest.fn().mockRejectedValue(new Error('Network Error'));

    await expect(fetchFakestoreData('products')).rejects.toThrow('Network Error');
  });
});
