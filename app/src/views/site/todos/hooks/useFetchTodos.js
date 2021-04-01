import axios from 'axios'
import Axios from 'components/Axios'
import { useState, useEffect } from 'react'
import { httpError } from 'helpers/Axios'

export default function useFetchTodos(id, options = {}) {
  const [loading, setLoading] = useState(true)
  const [data, setData] = useState([])
  const [error, setError] = useState(null)

  const fetchData = async () => {
    try {
      const request = await Axios.get(`todos/${id}`, options)
      console.log(request.data)
      const { data, status_code } = request.data

      if (httpError(status_code))
        throw new Error(`Something went wrong while processing the request.`)
      console.log(data)
      setLoading(false)
      setData(data)
      setError(null)
    } catch (err) {
      setError(`Something went wrong while processing the request.`)
      setLoading(false)
    }
  }

  useEffect(() => {
    fetchData()
  }, [])

  return { loading, data, error }
}
