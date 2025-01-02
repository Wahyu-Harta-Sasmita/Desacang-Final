import Beranda from '@/Components/myComponents/Beranda'
import BerandaLayout from '@/Layouts/BerandaLayout'
import React from 'react'

const Home = () => {
  return (
    <>
      <BerandaLayout>
        <Beranda />
      </BerandaLayout>
    </>
  )
}

export default Home