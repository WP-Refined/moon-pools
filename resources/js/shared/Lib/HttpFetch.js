export const HttpFetch = {
  get,
  post,
};

const BASE_URI = '/api';
const CSRF_TOKEN = document.head.querySelector('meta[name="csrf-token"]');
const DEFAULT_HEADERS = {
  'X-CSRF-TOKEN': null,
};

if (CSRF_TOKEN) {
  DEFAULT_HEADERS['X-CSRF-TOKEN'] = CSRF_TOKEN?.content;
} else {
  console.error('CSRF token not found.');
}

async function get(url) {
  const requestOptions = {
    method: 'GET',
    headers: { ...DEFAULT_HEADERS },
  };
  const response = await fetch(BASE_URI + url, requestOptions);
  return handleResponse(response);
}

async function post(url, body) {
  const requestOptions = {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', ...DEFAULT_HEADERS },
    body: JSON.stringify(body),
  };
  const response = await fetch(BASE_URI + url, requestOptions);
  return handleResponse(response);
}

function handleResponse(response) {
  return response.text().then(text => {
    const data = text && JSON.parse(text);

    if (!response.ok) {
      const error = (data && data.message) || response.statusText;
      return Promise.reject(error);
    }

    return data;
  });
}
