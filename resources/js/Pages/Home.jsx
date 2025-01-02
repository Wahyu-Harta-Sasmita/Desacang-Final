import About from '@/Components/myComponents/About'
import Beranda from '@/Components/myComponents/Beranda'
import Footer from '@/Components/myComponents/Footer'
import NavBar from '@/Components/myComponents/NavBar'
import React from 'react'

const Home = () => {
  return (
    <>
      <NavBar />
      <Beranda />
      <About />
      <Footer />
    </>
  )
}

export default Home