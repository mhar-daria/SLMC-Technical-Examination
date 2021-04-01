import React, { useState } from 'react'
import { Alert } from 'react-bootstrap'

export default function Error({ message, variant, title }) {
  const [showError, setShowError] = useState(true)
  const toggleClose = () => setShowError(!showError)
  return (
    <Alert variant={variant || 'danger'} dismissible onClose={toggleClose}>
      {title && <Alert.Heading>{title}</Alert.Heading>}
      <p>{message}</p>
    </Alert>
  )
}
