import React, { memo } from 'react'
import { Spinner } from 'react-bootstrap'

const DEFAULT_SPINNER_PROPS = {
  animation: 'border',
  role: 'status',
}

export default memo(({ message, spinnerOnly, variant, ...rest }) => {
  const mergeSpinnerProps = Object.assign(DEFAULT_SPINNER_PROPS, rest)

  if (spinnerOnly) return <Spinner {...mergeSpinnerProps} />

  return (
    <div className='text-center'>
      <Spinner {...mergeSpinnerProps} />
      {message && (
        <p
          className={`loading-text text-center text-${
            variant || 'success'
          } mt-3`}
        >
          {message}
        </p>
      )}
    </div>
  )
})
