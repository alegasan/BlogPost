import './bootstrap'

import $ from 'jquery'
window.$ = window.jQuery = $

import Alpine from 'alpinejs'
window.Alpine = Alpine

import toastr from 'toastr'
import 'toastr/build/toastr.css'
window.toastr = toastr

import 'trix'
import 'trix/dist/trix.css'

Alpine.start()

document.addEventListener('DOMContentLoaded', () => {
    const toastElement = document.querySelector('[data-toast]')

    if (!toastElement || !window.toastr) return

    let messages = {}

    try {
        messages = JSON.parse(toastElement.dataset.toast || '{}')
    } catch (e) {
        console.error('Failed to parse toast messages:', e)
        return
    }

    const types = ['success', 'error', 'warning', 'info']

    types.forEach((type) => {
        if (messages[type]) {
            window.toastr[type](messages[type])
        }
    })
})