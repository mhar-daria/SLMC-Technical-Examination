export const httpError = status_code =>
  parseInt(status_code, 10) < 200 || parseInt(status_code, 10) > 299
