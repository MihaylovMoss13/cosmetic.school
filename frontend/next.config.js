/** @type {import('next').NextConfig} */
const withCSS = require('@zeit/next-css')
module.exports = withCSS()

const withSass = require('@zeit/next-sass')
module.exports = withSass({
  cssModules: true
})

const nextConfig = {
  reactStrictMode: true,
}

module.exports = nextConfig
