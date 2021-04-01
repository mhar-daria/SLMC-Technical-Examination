import React, { forwardRef } from 'react'

export default forwardRef((Component, ref) => <Component forwardedRef={ref} />)
