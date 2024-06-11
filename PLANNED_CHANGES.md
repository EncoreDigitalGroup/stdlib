# v2.0.0

- `file_type()` will begin to return the file extension instead of fifo, char, dir, block, link, file, socket or unknown.
    - This will be a breaking change for some users. If you are using `file_type()` and wish to retain this functionality, you will need to use `file_system_type()`
      instead.
- `file_get_type()` will be deprecated in a minor release prior to v2.0.0. It will be removed in v2.0.0.