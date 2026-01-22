# Magento 2 Delivery Note Module

This module adds a custom delivery note field on the Magento 2 cart page
and saves the note

## Features
- Delivery note textarea on cart page
- Custom controller action
- No core overrides
- Magento 2 best practices

## Frontend Location
Cart Page (`checkout/cart`)

## How It Works
- User enters delivery note
- AJAX call saves note in session / quote
- Success message returned without page reload

## Folder Structure
app/code/Magediary/DeliveryNote
