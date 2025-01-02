import React from 'react'
import NavBar from '@/Components/myComponents/NavBar'
import Footer from '@/Components/myComponents/Footer'

const BerandaLayout = ({children}) => {
  return (
    <>
      <NavBar />
      {children}
      <Footer />
    </>
  )
}

export default BerandaLayout