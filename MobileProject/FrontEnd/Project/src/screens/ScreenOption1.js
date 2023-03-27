import React from "react";
import { View,Button} from "react-native";
import { Box, FlatList, Heading, Avatar, HStack, VStack, Text, Spacer, Center, NativeBaseProvider } from "native-base";
import AnimalListItem from "./AnimalListItem";
import Animals from "../utils/Animals.json";
const ScreenOption1 = ({navigation}) => {
  return <View>

    <Heading fontSize="xl" p="4" pb="3">
      <Center>Animals</Center>

    </Heading>
    <FlatList data={Animals} renderItem={({ item }) =>
    <AnimalListItem animal={item}/>
   } keyExtractor={item => item.id} />
    <Button  onPress={()=> navigation.navigate(screen.main)}>Hello</Button>

  </View>;
};

export default ScreenOption1