export function format(string, replace = [], regex = /:[^/]+/g) {
  if (!replace) throw Error('Expect :replace value')

  return string.replace(regex, (match, index) => replace.shift())
}
