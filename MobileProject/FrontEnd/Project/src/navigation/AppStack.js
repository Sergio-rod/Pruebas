import React from 'react'

// React navigation imports
import { createNativeStackNavigator } from '@react-navigation/native-stack';

// Screens names
import screen from '../utils/screenNames';

// Screens imports
import Main from '../screens/Main'
import ScreenOption1 from '../screens/ScreenOption1'
import ScreenOption2 from '../screens/ScreenOption2'
import ScreenOption3 from '../screens/ScreenOption3'
import AnimalListItem from '../screens/AnimalListItem'
const Stack = createNativeStackNavigator();

const AppStack = () => {
  return (
    <Stack.Navigator 
      initialRouteName={screen.main}
      screenOptions={{headerShown: false}}
    >
        <Stack.Screen 
            name={screen.main} 
            component={Main} 
        />

        <Stack.Screen 
            name={screen.screenOption1} 
            component={ScreenOption1} 
        />

        <Stack.Screen 
            name={screen.screenOption2} 
            component={ScreenOption2} 
        />

        <Stack.Screen 
            name={screen.screenOption3} 
            component={ScreenOption3} 
        />
        <Stack.Screen 
            name={screen.animalListItem} 
            component={AnimalListItem} 
        />

    </Stack.Navigator>
  )
}

export default AppStack