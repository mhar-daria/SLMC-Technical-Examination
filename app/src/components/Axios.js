import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: process.env.REACT_APP_API_BASE_URL,
  timeout: 1000 * 60 * 2,
  maxContentLength: 100 * 1024 * 1024,
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
  data: {},
})

export default axiosInstance
